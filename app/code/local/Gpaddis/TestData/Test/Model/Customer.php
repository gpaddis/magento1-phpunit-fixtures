<?php

/**
 * @package    Gpaddis_TestData
 * @author     Gianpiero Addis <gianpiero.addis@gmail.com>
 *
 * PHPUnit Class Annotations
 * @group Gpaddis_TestData
 */
class Gpaddis_TestData_Test_Model_Customer extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/customers
     */
    public function it_loads_the_customers()
    {
        $customer = Mage::getModel("customer/customer");

        $customer->load(1);
        $this->assertEquals('John Doe', $customer->getName());

        $customer->load(2);
        $this->assertEquals('Jane Doe', $customer->getName());
    }
}
