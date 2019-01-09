<?php

/**
 * @package Gpaddis_TestData
 * @author  Gianpiero Addis <g.addis@lemundo.de>
 *
 * @group Gpaddis_TestData
 */
class Gpaddis_TestData_Test_Model_Api extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @test
     * @loadFixture shop
     * @loadFixture category
     */
    public function test_catalog_category_info()
    {
        $apiModel = Mage::getModel('catalog/category_api');
        $categoryInfo = $apiModel->info(2);

        $this->assertEquals('Default Category', $categoryInfo['name']);
    }

    /**
     * @test
     * @loadFixture shop
     * @loadFixture product
     */
    public function test_catalog_product_info()
    {
        $apiModel = Mage::getModel('catalog/product_api');
        $productInfo = $apiModel->info(3);

        $this->assertEquals('configurable-product', $productInfo['name']);
    }

    /**
     * @test
     * @loadFixture shop
     * @loadFixture product
     */
    public function test_catalog_product_update()
    {
        $apiModel = Mage::getModel('catalog/product_api');

        $apiModel->update(2, ['sku' => 'new-sku']);
        $productInfo = $apiModel->info(2);

        $this->assertEquals('new-sku', $productInfo['sku']);
    }
}
