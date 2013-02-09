<?php
/**
 * Class Github_Model_Entity_Repo
 */
class Github_Model_Entity_Repo extends Github_Model_Entity_Core
{

    /**
     * @var string
     */
    private $_url;

    /**
     * @var string
     */
    private $_html_url;

    /**
     * @var string
     */
    private $_clone_url;

    /**
     * @var string
     */
    private $_git_url;

    /**
     * @var string
     */
    private $_ssh_url;

    /**
     * @var string
     */
    private $_svn_url;

    /**
     * @var string
     */
    private $_owner;

    /**
     * @var string
     */
    private $_name;

    /**
     * @var string
     */
    private $_description;

    /**
     * @var string
     */
    private $_homepage;

    /**
     * @var bool
     */
    private $_private;

    /**
     * @var bool
     */
    private $_fork;

    /**
     * @var int
     */
    private $_forks;

    /**
     * @var int
     */
    private $_watchers;

    /**
     * @var int
     */
    private $_size;

    /**
     * @var string
     */
    private $_master_branch;

    /**
     * @var int
     */
    private $_open_issues;

    /**
     * @var date
     */
    private $_pushed_at;

    /**
     * @var date
     */
    private $_created_at;

    /**
     * @var date
     */
    private $_updated_at;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->_name = (string)$name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param string $homepage
     *
     * @return $this
     */
    public function setHomepage($homepage)
    {
        $this->_homepage = (string)$homepage;

        return $this;
    }

    /**
     * @return string
     */
    public function getHomepage()
    {
        return $this->_homepage;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->_url = (string)$url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param Github_Model_Entity_User $owner
     *
     * @return $this
     */
    public function setOwner(Github_Model_Entity_User $owner)
    {
        $this->_owner = $owner;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->_owner;
    }

    /**
     * @return string
     */
    public function getHtmlUrl()
    {
        return $this->_html_url;
    }

    /**
     * @param string $html_url
     *
     * @return $this
     */
    public function setHtmlUrl($html_url)
    {
        $this->_html_url = (string)$html_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getCloneUrl()
    {
        return $this->_clone_url;
    }

    /**
     * @param string $clone_url
     *
     * @return $this
     */
    public function setCloneUrl($clone_url)
    {
        $this->_clone_url = (string)$clone_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getGitUrl()
    {
        return $this->_git_url;
    }

    /**
     * @param string $git_url
     *
     * @return $this
     */
    public function setGitUrl($git_url)
    {
        $this->_git_url = (string)$git_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getSshUrl()
    {
        return $this->_ssh_url;
    }

    /**
     * @param string $ssh_url
     *
     * @return $this
     */
    public function setSshUrl($ssh_url)
    {
        $this->_ssh_url = (string)$ssh_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getSvnUrl()
    {
        return $this->_svn_url;
    }

    /**
     * @param string $svn_url
     *
     * @return $this
     */
    public function setSvnUrl($svn_url)
    {
        $this->_svn_url = (string)$svn_url;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPrivate()
    {
        return $this->_private;
    }

    /**
     * @param bool $private
     *
     * @return $this
     */
    public function setPrivate($private)
    {
        $this->_private = (bool)$private;

        return $this;
    }

    /**
     * @return bool
     */
    public function getFork()
    {
        return $this->_fork;
    }

    /**
     * @param bool $fork
     *
     * @return $this
     */
    public function setFork($fork)
    {
        $this->_fork = (bool)$fork;

        return $this;
    }

    /**
     * @return int
     */
    public function getForks()
    {
        return $this->_forks;
    }

    /**
     * @param int $forks
     *
     * @return $this
     */
    public function setForks($forks)
    {
        $this->_forks = (int)$forks;

        return $this;
    }

    /**
     * @return int
     */
    public function getWatchers()
    {
        return $this->_watchers;
    }

    /**
     * @param int $watchers
     *
     * @return $this
     */
    public function setWatchers($watchers)
    {
        $this->_watchers = (int)$watchers;

        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @param int $size
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->_size = (int)$size;

        return $this;
    }

    /**
     * @return string
     */
    public function getMasterBranch()
    {
        return $this->_master_branch;
    }

    /**
     * @param string $master_branch
     *
     * @return $this
     */
    public function setMasterBranch($master_branch)
    {
        $this->_master_branch = (string)$master_branch;

        return $this;
    }

    /**
     * @return int
     */
    public function getOpenIssues()
    {
        return $this->_open_issues;
    }

    /**
     * @param int $open_issues
     *
     * @return $this
     */
    public function setOpenIssues($open_issues)
    {
        $this->_open_issues = (int)$open_issues;

        return $this;
    }

    /**
     * @return date
     */
    public function getPushedAt()
    {
        return $this->_pushed_at;
    }

    /**
     * @param date $pushed_at
     *
     * @return $this
     */
    public function setPushedAt($pushed_at)
    {
        $this->_pushed_at = $pushed_at;

        return $this;
    }

    /**
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    /**
     * @param date $created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->_created_at = $created_at;

        return $this;
    }

    /**
     * @return date
     */
    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }

    /**
     * @param date $updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->_updated_at = $updated_at;

        return $this;
    }


}