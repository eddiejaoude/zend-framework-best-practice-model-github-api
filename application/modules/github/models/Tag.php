<?php
class Github_Model_Tag extends Github_Model_Base {

    private $_name;
    private $_sha;
    private $_url;
    private $_zipball_url;
    private $_tarball_url;

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

    public function getZipballUrl()
    {
        return $this->_zipball_url;
    }

    public function setZipballUrl($zipball_url)
    {
        $this->_zipball_url = (string) $zipball_url;
        return $this;
    }

    public function getTarballUrl()
    {
        return $this->_tarball_url;
    }

    public function setTarballUrl($tarball_url)
    {
        $this->_tarball_url = (string) $tarball_url;
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