<?php
class Github_Model_Repo {
    
    private $_url;
    private $_html_url;
    private $_clone_url;
    private $_git_url;
    private $_ssh_url;
    private $_svn_url;
    private $_owner;
    private $_name;
    private $_description;
    private $_homepage;
    private $_private;
    private $_fork;
    private $_forks;
    private $_watchers;
    private $_size;
    private $_master_branch;
    private $_open_issues;
    private $_pushed_at;
    private $_created_at;
    
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

    public function setName($name) {
        $this->_name = (string) $name;
        return $this;
    }

    public function getName() {
        return $this->_name;
    }

    public function setDescription($description) {
        $this->_description = (string) $description;
        return $this;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function setHomepage($homepage) {
        $this->_homepage = (string) $homepage;
        return $this;
    }

    public function getHomepage() {
        return $this->_homepage;
    }

    public function setUrl($url) {
        $this->_url = (string) $url;
        return $this;
    }

    public function getUrl() {
        return $this->_url;
    }
    
    
    
}