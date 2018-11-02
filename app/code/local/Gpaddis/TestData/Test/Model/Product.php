<?php

/**
 * @package Gpaddis_TestData
 * @author  Gianpiero Addis <g.addis@lemundo.de>
 *
 * @group Gpaddis_TestData
 */
class Gpaddis_TestData_Test_Model_Product extends EcomDev_PHPUnit_Test_Case
{
    public function setUp()
    {
        $this->product = Mage::getModel('catalog/product');
    }
    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/product
     */
    public function it_loads_simple_products()
    {
        $this->product->load(1);
        $this->assertEquals('simple', $this->product->getTypeId());

        $this->product->load(2);
        $this->assertEquals('simple', $this->product->getTypeId());
    }

    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/product
     */
    public function it_loads_configurable_products()
    {
        $this->product->load(3);
        $this->assertEquals('configurable', $this->product->getTypeId());
    }
}
