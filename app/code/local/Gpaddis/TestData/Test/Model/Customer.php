<?php

/**
 * @package Gpaddis_TestData
 * @author  Gianpiero Addis <gianpiero.addis@gmail.com>
 *
 * @group Gpaddis_TestData
 */
class Gpaddis_TestData_Test_Model_Customer extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/customer
     */
    public function it_loads_the_customers()
    {
        $customer = Mage::getModel("customer/customer");

        $customer->load(1);
        $this->assertEquals('John Doe', $customer->getName());
        $this->assertEquals('john@doe.com', $customer->getEmail());

        $customer->load(2);
        $this->assertEquals('Jane Doe', $customer->getName());
        $this->assertEquals('jane@doe.com', $customer->getEmail());
    }
}
