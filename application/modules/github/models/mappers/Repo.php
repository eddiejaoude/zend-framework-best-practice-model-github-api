<?php

class Github_Model_Mapper_Repo extends Github_Model_Mapper_Base
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
                    ->setUrl($repo->url)
                    ->setHtmlUrl($repo->html_url)
                    ->setCloneUrl($repo->clone_url)
                    ->setGitUrl($repo->git_url)
                    ->setSshUrl($repo->ssh_url)
                    ->setSvnUrl($repo->svn_url)
                    ->setPrivate($repo->private)
                    ->setFork($repo->fork)
                    ->setForks($repo->forks)
                    ->setWatchers($repo->watchers)
                    ->setSize($repo->size)
                    ->setOpenIssues($repo->open_issues)
                    ->setPushedAt($repo->pushed_at)
                    ->setCreatedAt($repo->created_at)
                    ->setUpdatedAt($repo->updated_at);

                if (!empty($repo->master_branch)) {
                    $repoEntity->setMasterBranch($repo->master_branch);
                }

                $userEntity = new Github_Model_User;
                $userEntity->setUsername($repo->owner->login)
                    ->setAvatarUrl($repo->owner->avatar_url)
                    ->setUrl($repo->owner->url)
                    ->setGravatarId($repo->owner->gravatar_id)
                    ->setId($repo->owner->id);
                $repoEntity->setOwner($userEntity);

                $userEntityResponse->addRepo($repoEntity);
            }
            $this->getCache()->save($userEntityResponse, $cacheName);
        }

        return $userEntityResponse;
    }

    public function getTags(Github_Model_User $userEntityRequest, Github_Model_Repo $repoEntityRequest)
    {
        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
            $userEntityRequest->getUsername() . '_' .
            $repoEntityRequest->getName());

        if (($tags = $this->getCache()->load($cacheName)) === false) {
            $response = $this->getDatasource()->restGet(
                '/repos/' .
                    $userEntityRequest->getUsername() .  '/' .
                    $repoEntityRequest->getName() .
                    '/tags'
            );
            $body = $response->getBody();
            $json = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);

            $tags = array();
            foreach ($json as $tag) {
                $tagEntity = new Github_Model_Tag;
                $tagEntity->setName($tag->name)
                    ->setSha($tag->commit->sha)
                    ->setUrl($tag->commit->url)
                    ->setTarballUrl($tag->tarball_url)
                    ->setZipballUrl($tag->zipball_url);

                $tags[] = $tagEntity;
            }
            $this->getCache()->save($tags, $cacheName);
        }

        return $tags;
    }

    public function getBranches(Github_Model_User $userEntityRequest, Github_Model_Repo $repoEntityRequest)
    {
        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
            $userEntityRequest->getUsername() . '_' .
            $repoEntityRequest->getName());

        if (($branches = $this->getCache()->load($cacheName)) === false) {
            $response = $this->getDatasource()->restGet(
                '/repos/' .
                    $userEntityRequest->getUsername() .  '/' .
                    $repoEntityRequest->getName() .
                    '/branches'
            );
            $body = $response->getBody();
            $json = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);

            $branches = array();
            foreach ($json as $tag) {
                $branchEntity = new Github_Model_Branch;
                $branchEntity->setName($tag->name)
                    ->setSha($tag->commit->sha)
                    ->setUrl($tag->commit->url);

                $branches[] = $branchEntity;
            }
            $this->getCache()->save($branches, $cacheName);
        }

        return $branches;
    }

}
