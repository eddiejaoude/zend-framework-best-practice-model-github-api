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
    
    public function setUsername($username) {
        $this->_username = (string) $username;
    }
    
    public function getUsername() {
        return $this->_username;
    }

    public function setRepos(array $repos) {
        $this->_repos = $repos;
    }

    public function addRepo(Github_Model_Repo $repo) {
        $this->_repos[] = $repo;
    }

    public function getRepos() {
        return $this->_repos;
    }
    
    
}