<?php
/**
 * Class Test_Github_Model_Mapper_RepoNoResultsTest
 */
class Test_Github_Model_Entity_RepoSuccessTest extends BaseTestCase
{

    /**
     * @var Github_Model_Entity_Repo
     */
    public $_entity;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->_entity = new Github_Model_Entity_Repo;
    }

    /**
     * Test get set name
     */
    public function testGetSetName()
    {
        $name = 'eddiejaoude';
        $set = $this->_entity->setName($name);

        $this->assertEquals(true, $set instanceof Github_Model_Entity_Repo);
        $this->assertEquals(true, is_string($this->_entity->getName()));
        $this->assertEquals($name, $this->_entity->getName());
    }

    /**
     * Test get set description
     */
    public function testGetSetDescription()
    {
        $description = 'eddiejaoude';
        $set = $this->_entity->setDescription($description);

        $this->assertEquals(true, $set instanceof Github_Model_Entity_Repo);
        $this->assertEquals(true, is_string($this->_entity->getDescription()));
        $this->assertEquals($description, $this->_entity->getDescription());
    }



}
