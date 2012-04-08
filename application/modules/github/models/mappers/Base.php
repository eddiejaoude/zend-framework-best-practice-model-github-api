<?php

class Github_Model_Mapper_Base {

    protected $_datasource;
    protected $_cache;

    public function __construct($datasource = null)
    {
        if (!empty($datasource)) {
            $this->setDatasource($datasource);
        }
    }

    public function getDatasource()
    {
        return $this->_datasource;
    }

    public function getCache()
    {
        return $this->_cache;
    }

    public function setDatasource($datasource)
    {
        if ($datasource instanceof Github_Model_Datasource) {
            $this->_datasource = $datasource->getClient();
            $this->_cache = $datasource->getCache();
            return $this;
        }
        $this->_datasource = $datasource;
        return $this;
    }

    protected function sanatizeCacheName($name) {
        $search = array('/-/');
        $replace = array('_');
        $sanatizedName = preg_replace($search, $replace, $name);
        return $sanatizedName;
    }


}