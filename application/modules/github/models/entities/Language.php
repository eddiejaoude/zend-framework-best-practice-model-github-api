<?php

class Github_Model_Entity_Language extends Github_Model_Entity_Core {

    private $_name;
    private $_size;


    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    public function getSize()
    {
        return $this->_size;
    }

    public function setSize($size)
    {
        $this->_size = (int) $size;
        return $this;
    }

}