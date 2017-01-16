<?php

namespace tests\codeception\unit\models;


class UserTest extends CTestCase
{
    protected function setUp()
    {
        parent::setUp();
        // uncomment the following to load fixtures for user table
        //$this->loadFixtures(['user']);
    }

    function TestUser() {
    
    	$user = new User();
    	$user->firstName = 'Miles';
    	$user->lastName = 'Davis';
    	//$user->save();
    	$this->assertEquals('Miles Davis', $user->firstName.' '.$user->lastName);
    	//$this->tester->seeInDatabase('users', ['name' => 'Miles', 'surname' => 'Davis']);
	}
}
