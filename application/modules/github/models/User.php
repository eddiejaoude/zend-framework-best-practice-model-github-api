<?php
class Github_Model_User extends Github_Model_Base {
    
    private $_id;
    private $_login;
    private $_username;
    private $_avatar_url;
    private $_gravatar_id;
    private $_url;
    private $_name;
    private $_company;
    private $_blog;
    private $_location;
    private $_email;
    private $_hireable;
    private $_bio;
    private $_public_repos;
    private $_public_gists;
    private $_followers;
    private $_following;
    private $_html_url;
    private $_created_at;
    private $_type;
    private $_repos = array();

    public function setId($id) {
        $this->_id = (int) $id;
        return $this;
    }
    
    public function getId() {
        return $this->_id;
    }

    public function setAvatarUrl($avatar_url) {
        $this->_avatar_url = (string) $avatar_url;
        return $this;
    }

    public function getAvatarUrl() {
        return $this->_avatar_url;
    }

    public function setUsername($username) {
        $this->_username = (string) $username;
        return $this;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function setGravatarId($gravatar_id) {
        $this->_gravatar_id = (string) $gravatar_id;
        return $this;
    }

    public function getGravatarId() {
        return $this->_gravatar_id;
    }

    public function setUrl($url) {
        $this->_url = (string) $url;
        return $this;
    }

    public function getUrl() {
        return $this->_url;
    }


    public function setRepos(array $repos) {
        $this->_repos = $repos;
        return $this;
    }

    public function addRepo(Github_Model_Repo $repo) {
        $this->_repos[] = $repo;
        return $this;
    }

    public function getRepos() {
        return $this->_repos;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    public function getCompany()
    {
        return $this->_company;
    }

    public function setCompany($company)
    {
        $this->_company = (string) $company;
        return $this;
    }

    public function getBlog()
    {
        return $this->_blog;
    }

    public function setBlog($blog)
    {
        $this->_blog = (string) $blog;
        return $this;
    }

    public function getLocation()
    {
        return $this->_location;
    }

    public function setLocation($location)
    {
        $this->_location = (string) $location;
        return $this;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

    public function getHireable()
    {
        return $this->_hireable;
    }

    public function setHireable($hireable)
    {
        $this->_hireable = (bool) $hireable;
        return $this;
    }

    public function getBio()
    {
        return $this->_bio;
    }

    public function setBio($bio)
    {
        $this->_bio = (string) $bio;
        return $this;
    }

    public function getPublicRepos()
    {
        return $this->_public_repos;
    }

    public function setPublicRepos($public_repos)
    {
        $this->_public_repos = (int) $public_repos;
        return $this;
    }

    public function getPublicGists()
    {
        return $this->_public_gists;
    }

    public function setPublicGists($public_gists)
    {
        $this->_public_gists = (int) $public_gists;
        return $this;
    }

    public function getFollowers()
    {
        return $this->_followers;
    }

    public function setFollowers($followers)
    {
        $this->_followers = (int) $followers;
        return $this;
    }

    public function getFollowing()
    {
        return $this->_following;
    }

    public function setFollowing($following)
    {
        $this->_following = (int) $following;
        return $this;
    }

    public function getHtmlUrl()
    {
        return $this->_html_url;
    }

    public function setHtmlUrl($html_url)
    {
        $this->_html_url = (string) $html_url;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->_created_at = (string) $created_at;
        return $this;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function setType($type)
    {
        $this->_type = (string) $type;
        return $this;
    }


}