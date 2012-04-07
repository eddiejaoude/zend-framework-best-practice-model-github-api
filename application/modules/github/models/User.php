<?php
class Github_Model_User {
    
    private $_id;
    private $_login;
    private $_username;
    private $_avatar_url;
    private $_gravatar_id;
    private $_url;
    private $_repos = array();

    public function __construct(array $options = null) {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function setOptions(array $options) {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
    
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
        $this->_gravatar_id = (int) $gravatar_id;
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
    
    
}