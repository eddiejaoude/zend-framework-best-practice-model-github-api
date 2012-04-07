<?php

class Github_Model_Mapper_Repo
{

    protected $_datasource;
    protected $_cache;

    public function __construct($datasource = null)
    {
        if (!empty($datasource)) {
            $this->setDatasource($datasource);
        }
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

    public function getDatasource()
    {
        if (null === $this->_datasource) {
            $this->setDatasource('Github_Model_Datasource');
        }
        return $this->_datasource;
    }

    public function getCache()
    {
        return $this->_cache;
    }

    public function findByUser(Github_Model_User $userEntityRequest)
    {
        $cacheName = __NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' . $userEntityRequest->getUsername();
        if (($userEntityResponse = $this->getCache()->load($cacheName)) === false) {
            $response = $this->getDatasource()->restGet('/users/' . $userEntityRequest->getUsername() . '/repos');
            $body = $response->getBody();
            $json = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);

            $userEntityResponse = new Github_Model_User;
            $userEntityResponse->setUsername($userEntityRequest->getUsername());

            foreach ($json as $repo) {
                $repoEntity = new Github_Model_Repo;
                $repoEntity->setName($repo->name)
                    ->setDescription($repo->description)
                    ->setHomepage($repo->homepage)
                    ->setUrl($repo->url);

                $userEntityResponse->addRepo($repoEntity);
            }
            $this->getCache()->save($userEntityResponse, $cacheName);
        }

        return $userEntityResponse;
    }

}
