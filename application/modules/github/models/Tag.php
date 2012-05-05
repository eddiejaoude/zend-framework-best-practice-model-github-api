<?php
/**
 * Tag entity
 *
 * @package Github
 */
class Github_Model_Tag extends Github_Model_Base {

    /**
     * Name
     *
     * @var string
     */
    private $_name;
    /**
     * Sha
     *
     * @var string
     */
    private $_sha;
    /**
     * @var
     */
    private $_url;
    /**
     * @var
     */
    private $_zipball_url;
    /**
     * @var
     */
    private $_tarball_url;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param $name
     *
     * @return Github_Model_Tag
     */public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    /**
     * @return mixed
     */public function getSha()
    {
        return $this->_sha;
    }

    /**
     * @param $sha
     * @return Github_Model_Tag
     */public function setSha($sha)
    {
        $this->_sha = (string) $sha;
        return $this;
    }

    /**
     * @return mixed
     */public function getZipballUrl()
    {
        return $this->_zipball_url;
    }

    /**
     * @param $zipball_url
     * @return Github_Model_Tag
     */public function setZipballUrl($zipball_url)
    {
        $this->_zipball_url = (string) $zipball_url;
        return $this;
    }

    /**
     * @return mixed
     */public function getTarballUrl()
    {
        return $this->_tarball_url;
    }

    /**
     * @param $tarball_url
     * @return Github_Model_Tag
     */public function setTarballUrl($tarball_url)
    {
        $this->_tarball_url = (string) $tarball_url;
        return $this;
    }

    /**
     * @return mixed
     */public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param $url
     * @return Github_Model_Tag
     */public function setUrl($url)
    {
        $this->_url = (string) $url;
        return $this;
    }


}