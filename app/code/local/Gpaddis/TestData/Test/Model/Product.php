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
        parent::setUp();
    }

    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/product
     */
    public function it_loads_simple_products()
    {
        $this->markTestSkipped('Check which one fails.');

        $product = Mage::getModel('catalog/product')->load(1);
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
        $this->markTestSkipped('Check which one fails.');

        $product = Mage::getModel('catalog/product')->load(3);
        $this->assertEquals('configurable', $product->getTypeId());
    }
}
