<?php

require_once(APPLICATION_TESTS . '/github/models/mocks/RepoNoResults.php');
class Test_Github_Model_Mapper_RepoNoResultsTest extends BaseTestCase {

    /**
     * <apper object
     *
     * @author Eddie Jaoude
     * @param object $model
     *
     */
    private $_mapper;

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

        $dao = new Test_Github_Model_Mock_RepoNoResults();
        $this->_mapper = new Github_Model_Mapper_Repo($dao);
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
        $this->assertEquals(true, is_object($this->_mapper));
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
        $result = $this->_mapper->findByUsername(new Github_Model_Entity_User(array('username' => $username)));

        $this->assertEquals(true, is_object($result));
        $this->assertEquals(true, $result instanceof Github_Model_Entity_User);
        $this->assertEquals(true, is_string($result->getUsername()));
        $this->assertEquals($username, $result->getUsername());

        $this->assertEquals(array(), $result->getRepos());

    }


}

