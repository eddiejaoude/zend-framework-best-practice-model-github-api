<?php

require_once(APPLICATION_TESTS . '/github/models/mocks/RepoNoResults.php');
class Test_Github_Model_Service_RepoFailureTest extends BaseTestCase {

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

        //$dao = new Github_Model_Dao_Repo();
        $dao = new Test_Github_Model_Mock_RepoNoResults();
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
     * Get mapper throws exception
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetMapperThrowsException() {
        $service = new Github_Model_Service_Repo();
        try {
            $service->getMapper();
        } catch (Github_Model_Service_Exception_NoMapper $e) {
            $this->assertTrue(true);
            return;
        } catch (Exception $e) {
            $this->fail('Wrong exception thrown: ' . $e);
        }
        $this->fail('No exception thrown');
    }

    /**
     * Find by username throws exception
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testFindByUsernameThrowsException() {
        $username = '';
        try {
            $this->_service->findByUsername($username);
        } catch (Github_Model_Service_Exception_Empty $e) {
            $this->assertTrue(true);
            return;
        } catch (Exception $e) {
            $this->fail('Wrong exception thrown: ' . $e);
        }
        $this->fail('No exception thrown');

    }


}

