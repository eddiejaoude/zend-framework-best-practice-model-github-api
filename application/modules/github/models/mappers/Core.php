<?php
/**
 * Base mapper
 *
 * @author  Eddie Jaoude
 * @package Github
 */
abstract class Github_Model_Mapper_Core implements Github_Model_Mapper_Interface
{

    /**
     * DAO (web service, mock etc...)
     *
     * @var Github_Model_Dao_Interface
     */
    protected $_dao;

    /**
     * Constructor
     *
     * Dao is optional as can be injected via setDao method
     *
     * @param Github_Model_Dao_Interface|null $dao
     */
    public function __construct(Github_Model_Dao_Interface $dao = null)
    {
        if (!empty($dao)) {
            $this->setDao($dao);
        }
    }

    /**
     * Get dao
     *
     * @throws Github_Model_Mapper_Exception_NoDao
     * @internal param $void
     *
     * @return Github_Model_Dao_Interface
     */
    public function getDao()
    {
        if (empty($this->_dao)) {
            throw new Github_Model_Mapper_Exception_NoDao('No Dao available. Use $mapper->setDao($dao)');
        }
        return $this->_dao;
    }

    /**
     * Set dao
     *
     * @param Github_Model_Dao_Interface $dao
     *
     * @return Github_Model_Mapper_Core
     */
    public function setDao(Github_Model_Dao_Interface $dao)
    {
        $this->_dao = $dao;
        return $this;
    }



}