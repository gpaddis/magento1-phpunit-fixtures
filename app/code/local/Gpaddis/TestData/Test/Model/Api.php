<?php

/**
 * @package Gpaddis_TestData
 * @author  Gianpiero Addis <g.addis@lemundo.de>
 *
 * @group Gpaddis_TestData
 * @see How can I programmatically create an api role (SOAP): https://magento.stackexchange.com/a/68188
 */
class Gpaddis_TestData_Test_Model_Api extends EcomDev_PHPUnit_Test_Case
{
    public function setUp()
    {
        $this->api_username = 'john@example.com';
        $this->api_key = 'secret-key';

        $this->createApiRole();
        $this->createApiUser();
    }

    /**
     * Cleanup the test database.
     */
    public function tearDown()
    {
        $this->api_user->delete();
        $this->api_role->delete();
    }

    /** @test */
    public function it_gets_an_api_key()
    {
        $this->assertTrue(true);
    }

    /**
     * Persist a new Api role in the database.
     */
    protected function createApiRole()
    {
        $this->api_role = Mage::getModel('api/roles')
            ->setName('default-role')
            ->setPid(false)
            ->setRoleType('G')
            ->save();

        Mage::getModel('api/rules')
            ->setRoleId($this->api_role->getId())
            ->setResources(array('all'))
            ->saveRel();
    }

    /**
     * Persist a new Api user in the database.
     */
    protected function createApiUser()
    {
        $this->api_user = Mage::getModel('api/user');

        $attributes = array(
            'username' => $this->api_username,
            'firstname' => 'John',
            'lastname' => 'Smith',
            'email' => 'john@example.com',
            'api_key' => $this->api_key,
            'api_key_confirmation' => $this->api_key,
            'is_active' => 1,
            'user_roles' => '',
            'assigned_user_role' => '',
            'role_name' => '',
            'roles' => [$this->api_role->getId()]
        );

        $this->api_user->setData($attributes);

        $this->api_user->save()->load($this->api_user->getId());

        $this->api_user->setRoleIds([$this->api_role->getId()])
            ->setRoleUserId($this->api_user->getUserId())
            ->saveRelations();

    }
}
