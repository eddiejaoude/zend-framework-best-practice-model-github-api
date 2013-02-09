<?php
/**
 *
 *
 * @todo Logging entry/exit using aop with Zend_Events & Zend_Logger or factory?
 */
class Github_Model_Dao_Repo implements Github_Model_Dao_Interface, Github_Model_Dao_RepoInterface {

    /**
     * @var Zend_Rest_Client
     */
    public $_datasource;

    /**
     * @var string
     */
    public $_url;

    public function __construct() {
        $this->setUrl('https://api.github.com'); // move to config?
        $datasource = new Zend_Rest_Client($this->getUrl());
        $this->setDatasource($datasource);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param string $url
     *
     * @return Github_Model_Dao_Repo
     */
    public function setUrl($url)
    {
        $this->_url = (string) $url;

        return $this;
    }

    /**
     * @return Zend_Rest_Client
     */
    public function getDatasource()
    {
        return $this->_datasource;
    }

    /**
     * @param Zend_Rest_Client $datasource
     *
     * @return Github_Model_Dao_Repo
     */
    public function setDatasource(Zend_Rest_Client $datasource)
    {
        $this->_datasource = $datasource;
        return $this;
    }

    /**
     * @param Github_Model_Entity_User $user
     *
     * @internal param $username
     *
     * @return Zend_Http_Response
     */
    public function findByUsername(Github_Model_Entity_User $user) {
        $response = $this->getDatasource()->restGet('/users/' . (string) $user->getUsername() . '/repos');
        $body     = $response->getBody();
        $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
        return $json;
    }

    public function findTags(Github_Model_Entity_Repo $repo) {
        $response = $this->getDatasource()->restGet(
            '/repos/' .
                $repo->getOwner()->getUsername() . '/' .
                $repo->getName() .
                '/tags'
        );
        $body     = $response->getBody();
        $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
        return $json;
    }




}