<?php

class Test_Github_Model_Mapper_RepoTest extends BaseTestCase {

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
        $this->_model = new Github_Model_Mapper_Repo($datasource);
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
     * Find by user
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testFindByUser() {
        $username = 'eddiejaoude';
        $result = $this->_model->findByUser(new Github_Model_User(array('username' => $username)));

        $this->assertEquals(true, is_object($result));
        $this->assertEquals(true, $result instanceof Github_Model_User);
        $this->assertEquals(true, is_string($result->getUsername()));
        $this->assertEquals($username, $result->getUsername());

        foreach ($result->getRepos() as $k=>$v) {
            $this->assertEquals(true, is_object($v));
            $this->assertEquals(true, $v instanceof Github_Model_Repo);
            $this->assertEquals(true, is_string($v->getName()));
            $this->assertEquals(true, is_string($v->getDescription()));
            $this->assertEquals(true, is_string($v->getHomepage()));
            $this->assertEquals(true, is_string($v->getUrl()));
        }
    }

}

