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
    private $_updated_at;

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

    public function setOwner(Github_Model_User $owner) {
        $this->_owner = $owner;
        return $this;
    }

    public function getOwner() {
        return $this->_owner;
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

    public function getCloneUrl()
    {
        return $this->_clone_url;
    }

    public function setCloneUrl($clone_url)
    {
        $this->_clone_url = (string) $clone_url;
        return $this;
    }

    public function getGitUrl()
    {
        return $this->_git_url;
    }

    public function setGitUrl($git_url)
    {
        $this->_git_url = (string) $git_url;
        return $this;
    }

    public function getSshUrl()
    {
        return $this->_ssh_url;
    }

    public function setSshUrl($ssh_url)
    {
        $this->_ssh_url = (string) $ssh_url;
        return $this;
    }

    public function getSvnUrl()
    {
        return $this->_svn_url;
    }

    public function setSvnUrl($svn_url)
    {
        $this->_svn_url = (string) $svn_url;
        return $this;
    }

    public function getPrivate()
    {
        return $this->_private;
    }

    public function setPrivate($private)
    {
        $this->_private = (bool) $private;
        return $this;
    }

    public function getFork()
    {
        return $this->_fork;
    }

    public function setFork($fork)
    {
        $this->_fork = (bool) $fork;
        return $this;
    }

    public function getForks()
    {
        return $this->_forks;
    }

    public function setForks($forks)
    {
        $this->_forks = (int) $forks;
        return $this;
    }

    public function getWatchers()
    {
        return $this->_watchers;
    }

    public function setWatchers($watchers)
    {
        $this->_watchers = (int) $watchers;
        return $this;
    }

    public function getSize()
    {
        return $this->_size;
    }

    public function setSize($size)
    {
        $this->_size = (int) $size;
        return $this;
    }

    public function getMasterBranch()
    {
        return $this->_master_branch;
    }

    public function setMasterBranch($master_branch)
    {
        $this->_master_branch = (string) $master_branch;
        return $this;
    }

    public function getOpenIssues()
    {
        return $this->_open_issues;
    }

    public function setOpenIssues($open_issues)
    {
        $this->_open_issues = (int) $open_issues;
        return $this;
    }

    public function getPushedAt()
    {
        return $this->_pushed_at;
    }

    public function setPushedAt($pushed_at)
    {
        $this->_pushed_at = $pushed_at;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->_created_at = $created_at;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->_updated_at = $updated_at;
        return $this;
    }


}