<?php

class Test_Github_Model_Mapper_UserTest extends BaseTestCase {

    /**
     * Model object
     *
     * @author Eddie Jaoude
     * @param object $model
     *
     */
    private $_model;

    /**
     * Initialisation of config object
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function setup() {
        parent::setUp();
        $registry = Zend_Registry::getInstance();
        $datasource = new Github_Model_Datasource($registry);
        $this->_model = new Github_Model_Mapper_User($datasource);
    }

    /**
     * Test object creation
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testObjectInstance() {
        $this->assertEquals(true, is_object($this->_model));
    }

    /**
     * Find by username
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testFindByUsername() {
        $username = 'eddiejaoude';
        $result = $this->_model->findByUsername(new Github_Model_User(array('username' => $username)));

        $this->assertEquals(true, is_object($result));
        $this->assertEquals(true, $result instanceof Github_Model_User);
        $this->assertEquals(true, is_string($result->getUsername()));
        $this->assertEquals($username, $result->getUsername());
        $this->assertEquals(true, is_int($result->getId()));
        $this->assertEquals(true, is_string($result->getAvatarUrl()));
        $this->assertEquals(true, is_string($result->getGravatarId()));
        $this->assertEquals(true, is_string($result->getUrl()));
        $this->assertEquals(true, is_string($result->getName()));
        $this->assertEquals(true, is_string($result->getCompany()));
        $this->assertEquals(true, is_string($result->getBlog()));
        $this->assertEquals(true, is_string($result->getLocation()));
        $this->assertEquals(true, is_string($result->getEmail()));
        $this->assertEquals(true, is_bool($result->getHireable()));
        $this->assertEquals(true, is_string($result->getBio()));
        $this->assertEquals(true, is_int($result->getPublicRepos()));
        $this->assertEquals(true, is_int($result->getPublicGists()));
        $this->assertEquals(true, is_int($result->getFollowers()));
        $this->assertEquals(true, is_int($result->getFollowing()));
        $this->assertEquals(true, is_string($result->getHtmlUrl()));
        $this->assertEquals(true, is_string($result->getCreatedAt()));
        $this->assertEquals(true, is_string($result->getType()));

    }
}