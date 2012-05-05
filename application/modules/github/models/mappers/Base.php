<?php
/**
 * Base mapper
 *
 * @author  Eddie Jaoude
 * @package Github
 */
class Github_Model_Mapper_Base
{

    /**
     * Datasource (web service, mock etc...)
     *
     * @var Github_Model_Datasource
     */
    protected $_datasource;

    /**
     * Caching object
     *
     * @var Zend_Cache
     */
    protected $_cache;


    /**
     * Constructor
     *
     * Datasource is optional as can be injected via setDatasource method
     *
     * @param null $datasource
     */
    public function __construct($datasource = null)
    {
        if (!empty($datasource)) {
            $this->setDatasource($datasource);
        }
    }

    /**
     * Get datasource
     *
     * @param void
     *
     * @return Github_Model_Datasource
     */
    public function getDatasource()
    {
        if (null === $this->_datasource) {
            $registry   = Zend_Registry::getInstance();
            $datasource = new Github_Model_Datasource($registry);
            $this->setDatasource($datasource);
        }
        return $this->_datasource;
    }

    /**
     * Get cache
     *
     * @param void
     *
     * @return Zend_Cache
     */
    public function getCache()
    {
        return $this->_cache;
    }

    /**
     * Set datasource
     *
     * @param $datasource
     *
     * @return Github_Model_Mapper_Base
     */
    public function setDatasource($datasource)
    {
        if ($datasource instanceof Github_Model_Datasource) {
            $this->_datasource = $datasource->getClient();
            $this->_cache      = $datasource->getCache();
            return $this;
        }
        $this->_datasource = $datasource;
        return $this;
    }

    /**
     * Sanatize cache name
     *
     * @param string $name
     *
     * @return string
     */
    protected function sanatizeCacheName($name)
    {
        $search        = array('/-/');
        $replace       = array('_');
        $sanatizedName = preg_replace($search, $replace, $name);
        return $sanatizedName;
    }


}