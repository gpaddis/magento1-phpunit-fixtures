<?php

/**
 * @package Gpaddis_TestData
 * @author  Gianpiero Addis <g.addis@lemundo.de>
 *
 * @group Gpaddis_TestData
 */
class Gpaddis_TestData_Test_Model_Category extends EcomDev_PHPUnit_Test_Case
{
    public function setUp()
    {
        // Disable error message session_start(): Cannot send session cookie - headers already sent by
        @session_start();
        parent::setUp();
    }

    public function tearDown()
    {
        // Disable error message session_write_close(): Failed to write session data (user)
        @session_write_close();
        parent::tearDown();
    }

    /**
     * @test
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/category
     * @dataProvider dataProvider
     */
    public function load_categories($id, $name, $urlKey)
    {
        $category = Mage::getModel('catalog/category')->load($id);
        $this->assertEquals($id, $category->getId());
        $this->assertEquals($name, $category->getName());
        $this->assertContains($urlKey, $category->getUrl());
    }
}
