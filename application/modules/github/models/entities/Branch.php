<?php
class Github_Model_Entity_Branch extends Github_Model_Entity_Core {

    private $_name;
    private $_sha;
    private $_url;

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    public function getSha()
    {
        return $this->_sha;
    }

    public function setSha($sha)
    {
        $this->_sha = (string) $sha;
        return $this;
    }

    public function getUrl()
    {
        return $this->_url;
    }

    public function setUrl($url)
    {
        $this->_url = (string) $url;
        return $this;
    }


}