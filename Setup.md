# Set up instructions

This guide assumes:
1. You have already unzipped the files.
2. You have already installed docker 

3. Within the project root run ./bin/docker-run.sh 
4. I have added commands to the start up scripts to do the following: 
   1. Create the production build of the vue application
   2. Migrate and seed the database using laravel with test data.
5. To run tests you will have to exec into the containers and run the following commands from the working directory: 
   1. API php unit tests: ```bash ./vendor/bin/phpunit ``` 
   2. App Mocha test: ```bash  npm run test:unit ```