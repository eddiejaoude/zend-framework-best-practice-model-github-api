<?php

/**
 * Github model mapper repo
 *
 * @author  Eddie Jaoude
 * @package Github
 */
class Github_Model_Mapper_Repo extends Github_Model_Mapper_Core
{

    /**
     * Find by username
     *
     * @param Github_Model_Entity_User $userEntity
     *
     * @return Github_Model_Entity_User
     */
    public function findByUsername(Github_Model_Entity_User $userEntity)
    {

        // request
        $response = $this->getDao()->findByUsername($userEntity);

        // if no result found
        if (!is_array($response)) {
            return $userEntity;
        }

        // hidrate entities repos
        foreach ($response as $repo) {
            $repoEntity = new Github_Model_Entity_Repo;
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

            // only if master available
            if (!empty($repo->master_branch)) {
                $repoEntity->setMasterBranch($repo->master_branch);
            }

            // owner (user entity)
            $owner = new Github_Model_Entity_User;
            $owner->setUsername($repo->owner->login)
                ->setAvatarUrl($repo->owner->avatar_url)
                ->setUrl($repo->owner->url)
                ->setGravatarId($repo->owner->gravatar_id)
                ->setId($repo->owner->id);
            $repoEntity->setOwner($owner);

            // repo collection
            $userEntity->addRepo($repoEntity);
        }

        return $userEntity;
    }

//    /**
//     * Get tags
//     *
//     * @param Github_Model_Entity_Repo $repo
//     *
//     * @return array
//     */
//    public function findTags(Github_Model_Entity_Repo $repo)
//    {
//        // request
//        $response = $this->getDatasource()->findTags($repo);
//
//        $tags = array();
//        foreach ($response as $tag) {
//            $tagEntity = new Github_Model_Entity_Tag;
//            $tagEntity->setName($tag->name)
//                ->setSha($tag->commit->sha)
//                ->setUrl($tag->commit->url)
//                ->setTarballUrl($tag->tarball_url)
//                ->setZipballUrl($tag->zipball_url);
//
//            $tags[] = $tagEntity;
//        }
//
//        return $tags;
//    }
//
//    /**
//     * Get branches
//     *
//     * @param Github_Model_Entity_User $userEntityRequest
//     * @param Github_Model_Entity_Repo $repoEntityRequest
//     *
//     * @return array
//     */
//    public function getBranches(Github_Model_Entity_User $userEntityRequest, Github_Model_Entity_Repo $repoEntityRequest)
//    {
//        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
//            $userEntityRequest->getUsername() . '_' .
//            $repoEntityRequest->getName());
//
//        if (($branches = $this->getCache()->load($cacheName)) === false) {
//            $response = $this->getDatasource()->restGet(
//                '/repos/' .
//                    $userEntityRequest->getUsername() . '/' .
//                    $repoEntityRequest->getName() .
//                    '/branches'
//            );
//            $body     = $response->getBody();
//            $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
//
//            $branches = array();
//            foreach ($json as $branch) {
//                $branchEntity = new Github_Model_Entity_Branch;
//                $branchEntity->setName($branch->name)
//                    ->setSha($branch->commit->sha)
//                    ->setUrl($branch->commit->url);
//
//                $branches[] = $branchEntity;
//            }
//            $this->getCache()->save($branches, $cacheName);
//        }
//
//        // @todo return repo with collection of branches?
//        return $branches;
//    }
//
//    /**
//     * Get languages
//     *
//     * @param Github_Model_Entity_User $userEntityRequest
//     * @param Github_Model_Entity_Repo $repoEntityRequest
//     *
//     * @return array
//     */
//    public function getLanguages(Github_Model_Entity_User $userEntityRequest, Github_Model_Entity_Repo $repoEntityRequest)
//    {
//        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
//            $userEntityRequest->getUsername() . '_' .
//            $repoEntityRequest->getName());
//
//        if (($languages = $this->getCache()->load($cacheName)) === false) {
//            $response = $this->getDatasource()->restGet(
//                '/repos/' .
//                    $userEntityRequest->getUsername() . '/' .
//                    $repoEntityRequest->getName() .
//                    '/languages'
//            );
//            $body     = $response->getBody();
//            $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
//
//            $languages = array();
//            foreach ($json as $language=> $size) {
//                $languageEntity = new Github_Model_Entity_Language;
//                $languageEntity->setName($language)
//                    ->setSize($size);
//
//                $languages[] = $languageEntity;
//            }
//            $this->getCache()->save($languages, $cacheName);
//        }
//
//        return $languages;
//    }
//
//    /**
//     * Get collaborators
//     *
//     * @param Github_Model_Entity_User $userEntityRequest
//     * @param Github_Model_Entity_Repo $repoEntityRequest
//     *
//     * @return array
//     */
//    public function getCollaborators(Github_Model_Entity_User $userEntityRequest, Github_Model_Entity_Repo $repoEntityRequest)
//    {
//        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
//            $userEntityRequest->getUsername() . '_' .
//            $repoEntityRequest->getName());
//
//        if (($collaborators = $this->getCache()->load($cacheName)) === false) {
//            $response = $this->getDatasource()->restGet(
//                '/repos/' .
//                    $userEntityRequest->getUsername() . '/' .
//                    $repoEntityRequest->getName() .
//                    '/collaborators'
//            );
//            $body     = $response->getBody();
//            $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
//
//            $collaborators = array();
//            foreach ($json as $collaborator) {
//                $userEntity = new Github_Model_Entity_User;
//                $userEntity->setUsername($collaborator->login)
//                    ->setAvatarUrl($collaborator->avatar_url)
//                    ->setUrl($collaborator->url)
//                    ->setGravatarId($collaborator->gravatar_id)
//                    ->setId($collaborator->id);
//
//                $collaborators[] = $userEntity;
//            }
//            $this->getCache()->save($collaborators, $cacheName);
//        }
//
//        return $collaborators;
//    }
//
//    /**
//     * Get forks
//     *
//     * @param Github_Model_Entity_User $userEntityRequest
//     * @param Github_Model_Entity_Repo $repoEntityRequest
//     *
//     * @return array
//     */
//    public function getForks(Github_Model_Entity_User $userEntityRequest, Github_Model_Entity_Repo $repoEntityRequest)
//    {
//        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
//            $userEntityRequest->getUsername() . '_' .
//            $repoEntityRequest->getName());
//        if (($repos = $this->getCache()->load($cacheName)) === false) {
//            $response = $this->getDatasource()->restGet(
//                '/repos/' .
//                    $userEntityRequest->getUsername() . '/' .
//                    $repoEntityRequest->getName() .
//                    '/forks'
//            );
//            $body     = $response->getBody();
//            $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
//
//            $repos = array();
//            foreach ($json as $repo) {
//                $repoEntity = new Github_Model_Entity_Repo;
//                $repoEntity->setName($repo->name)
//                    ->setDescription($repo->description)
//                    ->setHomepage($repo->homepage)
//                    ->setUrl($repo->url)
//                    ->setHtmlUrl($repo->html_url)
//                    ->setCloneUrl($repo->clone_url)
//                    ->setGitUrl($repo->git_url)
//                    ->setSshUrl($repo->ssh_url)
//                    ->setSvnUrl($repo->svn_url)
//                    ->setPrivate($repo->private)
//                    ->setFork($repo->fork)
//                    ->setForks($repo->forks)
//                    ->setWatchers($repo->watchers)
//                    ->setSize($repo->size)
//                    ->setOpenIssues($repo->open_issues)
//                    ->setPushedAt($repo->pushed_at)
//                    ->setCreatedAt($repo->created_at)
//                    ->setUpdatedAt($repo->updated_at);
//
//                if (!empty($repo->master_branch)) {
//                    $repoEntity->setMasterBranch($repo->master_branch);
//                }
//
//                $userEntity = new Github_Model_Entity_User;
//                $userEntity->setUsername($repo->owner->login)
//                    ->setAvatarUrl($repo->owner->avatar_url)
//                    ->setUrl($repo->owner->url)
//                    ->setGravatarId($repo->owner->gravatar_id)
//                    ->setId($repo->owner->id);
//                $repoEntity->setOwner($userEntity);
//
//                $repos[] = $repoEntity;
//            }
//            $this->getCache()->save($repos, $cacheName);
//        }
//
//        return $repos;
//    }
//
//    /**
//     * Get watchers
//     *
//     * @param Github_Model_Entity_User $userEntityRequest
//     * @param Github_Model_Entity_Repo $repoEntityRequest
//     *
//     * @return array
//     */
//    public function getWatchers(Github_Model_Entity_User $userEntityRequest, Github_Model_Entity_Repo $repoEntityRequest)
//    {
//        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
//            $userEntityRequest->getUsername() . '_' .
//            $repoEntityRequest->getName());
//
//        if (($watchers = $this->getCache()->load($cacheName)) === false) {
//            $response = $this->getDatasource()->restGet(
//                '/repos/' .
//                    $userEntityRequest->getUsername() . '/' .
//                    $repoEntityRequest->getName() .
//                    '/watchers'
//            );
//            $body     = $response->getBody();
//            $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
//
//            $watchers = array();
//            foreach ($json as $watcher) {
//                $userEntity = new Github_Model_Entity_User;
//                $userEntity->setUsername($watcher->login)
//                    ->setAvatarUrl($watcher->avatar_url)
//                    ->setUrl($watcher->url)
//                    ->setGravatarId($watcher->gravatar_id)
//                    ->setId($watcher->id);
//
//                $watchers[] = $userEntity;
//            }
//            $this->getCache()->save($watchers, $cacheName);
//        }
//
//        return $watchers;
//    }
//
//    /**
//     * Get pull requests
//     *
//     * @param Github_Model_Entity_User $userEntityRequest
//     * @param Github_Model_Entity_Repo $repoEntityRequest
//     *
//     * @return array
//     */
//    public function getPullRequests(
//        Github_Model_Entity_User $userEntityRequest,
//        Github_Model_Entity_Repo $repoEntityRequest
//    )
//    {
//        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
//            $userEntityRequest->getUsername() . '_' .
//            $repoEntityRequest->getName());
//
//        if (($pullRequests = $this->getCache()->load($cacheName)) === false) {
//            $response = $this->getDatasource()->restGet(
//                '/repos/' .
//                    $userEntityRequest->getUsername() . '/' .
//                    $repoEntityRequest->getName() .
//                    '/pulls'
//            );
//            $body     = $response->getBody();
//            $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);
//
//            $pullRequests = array();
//            foreach ($json as $pullRequest) {
//                $pullRequestEntity = new Github_Model_Entity_PullRequest;
//                $pullRequestEntity->setUrl($pullRequest->url)
//                    ->setHtmlUrl($pullRequest->html_url)
//                    ->setDiffUrl($pullRequest->diff_url)
//                    ->setPatchUrl($pullRequest->patch_url)
//                    ->setIssueUrl($pullRequest->issue_url)
//                    ->setNumber($pullRequest->number)
//                    ->setState($pullRequest->state)
//                    ->setTitle($pullRequest->title)
//                    ->setBody($pullRequest->body)
//                    ->setCreatedAt($pullRequest->created_at)
//                    ->setUpdatedAt($pullRequest->updated_at)
//                    ->setClosedAt($pullRequest->closed_at)
//                    ->setMergedAt($pullRequest->merged_at)
//                    ->setLinkSelfHref($pullRequest->_links->self->href)
//                    ->setLinkHtmlHref($pullRequest->_links->html->href)
//                    ->setLinkCommentsHref($pullRequest->_links->comments->href)
//                    ->setLinkReviewCommentsHref($pullRequest->_links->review_comments->href);
//
//                $pullRequests[] = $pullRequestEntity;
//            }
//            $this->getCache()->save($pullRequests, $cacheName);
//        }
//
//        return $pullRequests;
//    }

}
