<?php

require_once(APPLICATION_TESTS . '/github/models/mocks/RepoNoResults.php');
class Test_Github_Model_Mapper_RepoFailureTest extends BaseTestCase {

    /**
     * Mapper object
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
     * Get dao throws exception
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetDaoThrowsException() {
        $mapper = new Github_Model_Mapper_Repo();
        try {
            $mapper->getDao();
        } catch (Github_Model_Mapper_Exception_NoDao $e) {
            $this->assertTrue(true);
            return;
        } catch (Exception $e) {
            $this->fail('Wrong exception thrown: ' . $e);
        }
        $this->fail('No exception thrown');
    }


}

