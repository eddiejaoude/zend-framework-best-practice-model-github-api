<?php

require_once(APPLICATION_TESTS . '/github/models/mocks/RepoSuccess.php');
class Test_Github_Model_Service_RepoSuccessTest extends BaseTestCase {

    /**
     * service object
     *
     * @author Eddie Jaoude
     * @param object $_service
     *
     */
    private $_service;

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

        //$dao = new Github_Model_Dao_Repo(); // integration test
        $dao = new Test_Github_Model_Mock_RepoSuccess();
        $mapper = new Github_Model_Mapper_Repo($dao);
        $this->_service = new Github_Model_Service_Repo($mapper);
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
        $this->assertEquals(true, is_object($this->_service));
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
        $result = $this->_service->findByUsername($username);

        $this->assertEquals(true, is_object($result));
        $this->assertEquals(true, $result instanceof Github_Model_Entity_User);
        $this->assertEquals(true, is_string($result->getUsername()));
        $this->assertEquals($username, $result->getUsername());
        $this->assertEquals(true, is_array($result->getRepos()));
        $this->assertGreaterThan(1, count($result->getRepos()));
    }



}

