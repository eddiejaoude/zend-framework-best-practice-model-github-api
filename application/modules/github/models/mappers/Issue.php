<?php

class Github_Model_Mapper_Issue {

    protected $_datasource;

    public function setDatasource($datasource) {
        if (is_string($datasource)) {
            $datasource = new $datasource();
        }
        if ($datasource instanceof Github_Model_Datasource) {
            $datasource = $datasource->getClient();
        }
        $this->_datasource = $datasource;
        return $this;
    }

    public function getDatasource() {
        if (null === $this->_datasource) {
            $this->setDatasource('Github_Model_Datasource');
        }
        return $this->_datasource;
    }


}
