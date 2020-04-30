<?php

namespace Tests\Feature;

use App\Unit;
use App\Charge;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    // all units can be retrieved

    /** @test */
    public function all_units_can_be_retrieved()
    {
        // Create 10 units
        factory(Unit::class, 10)->create(['status' => 'available']);

        // get them all
        $response = $this->get('api/units');

        $units = Unit::all();

        $response->assertStatus(200);
        $response->assertJsonCount(10, 'data');
        foreach( $units as $unit){
            $response->assertSee($unit->name);
        }
    }

    // one unit can be retrieved 
     /** @test */
     public function one_unit_can_be_retrieved()
     {
         // Create 1 unit
         factory(Unit::class, 1)->create(['status' => 'available']);
         
         $unit = Unit::first();

         // get them all
        $response = $this->get("api/units/{$unit->id}");
        $response->assertStatus(200);

        // Check all the information has been returned
        foreach( $unit->attributesToArray() as $key => $value){
            if( ! in_array($key, ['created_at', 'updated_at']) ){
                $this->assertTrue($response->json()['data'][$key] == $value);
            }
        }
     }
    
    // a charge can be added to a unit
    
    /** @test */
    public function a_charge_can_be_added_to_a_unit()
    {
        // Create 1 unit
        factory(Unit::class, 1)->create(['status' => 'available']);
        
        $unit = Unit::first();

       $response = $this->post("api/units/{$unit->id}");

       $response->assertStatus(201); // created

       $this->assertTrue(count(Charge::all()) == 1);
       
       $charge = Charge::first();
       $this->assertTrue($charge->unit_id == $unit->id);

    }
    
    // a unit's status is 'charging' after adding a charge
    
    /** @test */
    public function a_units_status_is_charging_after_adding_a_charge()
    {
        // Create 1 unit
        factory(Unit::class, 1)->create(['status' => 'available']);
        
        $unit = Unit::first();

        $this->assertTrue($unit->status == 'available');
        
        $response = $this->post("api/units/{$unit->id}");
        
        $this->assertTrue($unit->fresh()->status == 'charging');

    }

    // a charge can be stopped

      /** @test */
      public function a_charge_can_be_stopped()
      {
        // Create 1 unit
        factory(Unit::class, 1)->create(['status' => 'available']);
          
        $unit = Unit::first();
        
        // Create the charge
         $response = $this->post("api/units/{$unit->id}");

         $charge = Charge::first();
         
         // Stop the charge
         $response = $this->patch("api/units/{$unit->id}/charges/{$charge->id}");
  
         $response->assertStatus(200); // updated
  
         $this->assertTrue(! empty($charge->fresh()->end));
         
         $charge = Charge::first();
         $this->assertTrue($charge->unit_id == $unit->id);
  
      }
      

    // a unit's status is 'available' after it's current charge is stopped
    /** @test */
    public function a_units_status_is_available_after_its_current_charge_is_stopped()
    {
      // Create 1 unit
      $unit = factory(Unit::class, 1)->create(['status' => 'available'])->pop();

      // Create the charge
       $response = $this->post("api/units/{$unit->id}");

       $charge = Charge::first();
       
       // Stop the charge
       $response = $this->patch("api/units/{$unit->id}/charges/{$charge->id}");

       $this->assertTrue($unit->fresh()->status == 'available');

    }

    // a charge cannot be added to a unit when the unit status is 'charging'
    /** @test */
    public function a_charge_cannot_be_added_to_a_unit_when_the_unit_status_is_charging()
    {
        // Create 1 unit
        $unit = factory(Unit::class, 1)->create(['status' => 'charging'])->pop();
        
        // Create the charge
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('POST', "api/units/{$unit->id}");
        
        $response->assertStatus(422); // Validation error
        $response->assertSee('This unit is already being charged. You cannot add another charge until the current one ends.');
    }

    // a charge that has already been terminated cannot be reterminated
     /** @test */
     public function  a_charge_that_has_already_been_terminated_cannot_be_reterminated()
     {
       // Create 1 unit
       $unit = factory(Unit::class, 1)->create(['status' => 'available'])->pop();
         
       // Create the charge
        $response = $this->post("api/units/{$unit->id}");

        // Stop the charge
        $charge = Charge::first();
        $response = $this->patch("api/units/{$unit->id}/charges/{$charge->id}");
        
        // Try to stop the charge again
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('PATCH', "api/units/{$unit->id}/charges/{$charge->id}");

        $response->assertStatus(422); // Validation error
        $response->assertSee('This charge has already been terminated so it is not possible to stop it.');
     }
    
}
