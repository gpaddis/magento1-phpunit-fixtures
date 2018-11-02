<?php

/**
 * @package Gpaddis_TestData
 * @author  Gianpiero Addis <g.addis@lemundo.de>
 *
 * @group Gpaddis_TestData
 */
class Gpaddis_TestData_Test_Model_Product extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/product
     */
    public function it_loads_simple_products()
    {
        $product = Mage::getModel('catalog/product');

        $product->load(1);
        $this->assertEquals('simple', $product->getTypeId());

        $product->load(2);
        $this->assertEquals('simple', $product->getTypeId());
    }

    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/product
     */
    public function it_loads_configurable_products()
    {
        $product = Mage::getModel('catalog/product');

        $product->load(3);
        $this->assertEquals('configurable', $product->getTypeId());
    }
}
