import App from "../../src/App";
import Units from "../../src/components/Units";
import { shallowMount } from "@vue/test-utils";
import { expect } from "chai";

describe("App", () => {
  let component;

  beforeEach(() => {
    component = shallowMount(App);
  });

  it("should render unit list", () => {
    expect(component.find(Units).exists()).to.be.true;
  });
});