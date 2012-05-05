<?php

/**
 * User mapper
 *
 * @package Github
 */
class Github_Model_Mapper_User extends Github_Model_Mapper_Base
{

    /**
     * Find by username
     *
     * @param Github_Model_User $userEntityRequest
     *
     * @return Github_Model_User
     */
    public function findByUsername(Github_Model_User $userEntityRequest)
    {
        $cacheName = $this->sanatizeCacheName(__NAMESPACE__ . '_' . __CLASS__ . '_' . __FUNCTION__ . '_' .
            $userEntityRequest->getUsername());

        if (($userEntityResponse = $this->getCache()->load($cacheName)) === false) {
            $response = $this->getDatasource()->restGet('/users/' . $userEntityRequest->getUsername());
            $body     = $response->getBody();
            $json     = Zend_Json::decode($body, Zend_Json::TYPE_OBJECT);

            $userEntityResponse = new Github_Model_User;
            $userEntityResponse->setUsername($json->login)
                ->setAvatarUrl($json->avatar_url)
                ->setUrl($json->url)
                ->setGravatarId($json->gravatar_id)
                ->setId($json->id)
                ->setUrl($json->url)
                ->setName($json->name)
                ->setCompany($json->company)
                ->setBlog($json->blog)
                ->setLocation($json->location)
                ->setEmail($json->email)
                ->setHireable($json->hireable)
                ->setBio($json->bio)
                ->setPublicRepos($json->public_repos)
                ->setPublicGists($json->public_gists)
                ->setFollowers($json->followers)
                ->setFollowing($json->following)
                ->setHtmlUrl($json->html_url)
                ->setCreatedAt($json->created_at)
                ->setType($json->type);

            $this->getCache()->save($userEntityResponse, $cacheName);
        }

        return $userEntityResponse;
    }

}
