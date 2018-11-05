<?php

/**
 * @package Gpaddis_Testdata
 * @author  Gianpiero Addis <g.addis@lemundo.de>
 *
 * @group Gpaddis_Testdata
 */
class Gpaddis_Testdata_Test_Model_Integration_Product extends EcomDev_PHPUnit_Test_Case_Controller
{
    public function setUp()
    {
        // Disable error message session_start(): Cannot send session cookie - headers already sent by
        @session_start();

        $this->product = Mage::getModel('catalog/product');
        parent::setUp();
    }

    public function tearDown()
    {
        // Disable error message session_write_close(): Failed to write session data (user)
        @session_write_close();
        parent::tearDown();
    }

    /**
     * @loadFixture ~Gpaddis_TestData/shop
     * @loadFixture ~Gpaddis_TestData/product
     * @test
     */
    public function it_displays_the_name_on_product_page()
    {
        $this->product->load(2);
        $path = $this->getProductUrlPath($this->product);

        $this->dispatch($path);

        $this->assertResponseHttpCode(200);
        $this->assertResponseBodyContains($this->product->getSku());
        $this->assertResponseBodyNotContains("Whoops, our bad...");
    }

    /**
     * Get the product url path to dispatch in the test case.
     *
     * @param Mage_Catalog_Model_Product $product
     * @return string
     */
    protected function getProductUrlPath(Mage_Catalog_Model_Product $product)
    {
        return "catalog/product/view/id/" . $this->product->getId();
    }
}
