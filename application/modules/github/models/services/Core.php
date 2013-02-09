<?php

/**
 * Github model service core
 *
 * @author  Eddie Jaoude
 * @package Github
 */
abstract class Github_Model_Service_Core
{

    /**
     * Mapper
     *
     * @var Github_Model_Mapper_Interface
     */
    protected $_mapper;

    /**
     * Constructor
     *
     * Mapper is optional as can be injected via setMapper method
     *
     * @param Github_Model_Mapper_Interface|null $mapper
     */
    public function __construct(Github_Model_Mapper_Interface $mapper = null)
    {
        if (!empty($mapper)) {
            $this->setMapper($mapper);
        }
    }

    /**
     * Get mapper
     *
     * @throws Github_Model_Service_Exception_NoMapper
     * @internal param $void
     *
     * @return Github_Model_Mapper_Interface
     */
    public function getMapper()
    {
        if (empty($this->_mapper)) {
            throw new Github_Model_Service_Exception_NoMapper('No Mapper available. Use $service->setMapper($mapper)');
        }
        return $this->_mapper;
    }

    /**
     * Set mapper
     *
     * @param Github_Model_Mapper_Interface $mapper
     *
     * @return Github_Model_Service_Core
     */
    public function setMapper(Github_Model_Mapper_Interface $mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }

}