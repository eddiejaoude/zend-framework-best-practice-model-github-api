<?php
/**
 * User entity
 */
class Github_Model_User extends Github_Model_Base
{

    /**
     * Id
     *
     * @var string
     */
    private $_id;

    /**
     * Login
     *
     * @var string
     */
    private $_login;

    /**
     * Username
     *
     * @var string
     */
    private $_username;

    /**
     * Avartar url
     *
     * @var string
     */
    private $_avatar_url;

    /**
     * Gravatar id
     *
     * @var string
     */

    private $_gravatar_id;

    /**
     * Url
     *
     * @var string
     */
    private $_url;

    /**
     * Name
     *
     * @var string
     */
    private $_name;

    /**
     * Company
     *
     * @var string
     */
    private $_company;

    /**
     * Blog
     *
     * @var string
     */
    private $_blog;

    /**
     * Location
     *
     * @var string
     */
    private $_location;

    /**
     * Emal
     *
     * @var string
     */
    private $_email;

    /**
     * Hireable
     *
     * @var bool
     */
    private $_hireable;

    /**
     * Bio
     *
     * @var string
     */
    private $_bio;

    /**
     * Public repos
     *
     * @var array
     */
    private $_public_repos;

    /**
     * Public gists
     *
     * @var int
     */
    private $_public_gists;

    /**
     * Followers
     *
     * @var int
     */
    private $_followers;

    /**
     * Following
     *
     * @var int
     */
    private $_following;

    /**
     * html url
     *
     * @var string
     */
    private $_html_url;

    /**
     * Created at
     *
     * @var string
     */
    private $_created_at;

    /**
     * Type
     *
     * @var string
     */
    private $_type;

    /**
     * Repository collection (repositories)
     *
     * @var array
     */
    private $_repos = array();

    /**
     * Set Id
     *
     * @param int $id
     *
     * @return Github_Model_User
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }

    /**
     * Get Id
     *
     * @param void
     *
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set avatar url
     *
     * @param string $avatar_url
     *
     * @return Github_Model_User
     */
    public function setAvatarUrl($avatar_url)
    {
        $this->_avatar_url = (string)$avatar_url;
        return $this;
    }

    /**
     * Get avatar url
     *
     * @param void
     *
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->_avatar_url;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Github_Model_User
     */
    public function setUsername($username)
    {
        $this->_username = (string)$username;
        return $this;
    }

    /**
     * Get username
     *
     * @param void
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * Set gravatar id
     *
     * @param string $gravatar_id
     *
     * @return Github_Model_User
     */
    public function setGravatarId($gravatar_id)
    {
        $this->_gravatar_id = (string)$gravatar_id;
        return $this;
    }

    /**
     * Get gravatar id
     *
     * @param void
     *
     * @return string
     */
    public function getGravatarId()
    {
        return $this->_gravatar_id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Github_Model_User
     */
    public function setUrl($url)
    {
        $this->_url = (string)$url;
        return $this;
    }

    /**
     * Get url
     *
     * @param void
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }


    /**
     * Set repos
     *
     * @param array $repos
     *
     * @return Github_Model_User
     */
    public function setRepos(array $repos)
    {
        $this->_repos = $repos;
        return $this;
    }

    /**
     * Add repo
     *
     * @param Github_Model_Repo $repo
     *
     * @return Github_Model_User
     */
    public function addRepo(Github_Model_Repo $repo)
    {
        $this->_repos[] = $repo;
        return $this;
    }

    /**
     * Get repos
     *
     * @param void
     *
     * @return array
     */
    public function getRepos()
    {
        return $this->_repos;
    }

    /**
     * Get name
     *
     * @param void
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Github_Model_User
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }

    /**
     * Get company
     *
     * @param void
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->_company;
    }

    /**
     * @param $company
     *
     * @return Github_Model_User
     */
    public function setCompany($company)
    {
        $this->_company = (string)$company;
        return $this;
    }

    /**
     * Get blog
     *
     * @param void
     *
     * @return string
     */
    public function getBlog()
    {
        return $this->_blog;
    }

    /**
     * Set blog
     *
     * @param string $blog
     *
     * @return Github_Model_User
     */
    public function setBlog($blog)
    {
        $this->_blog = (string)$blog;
        return $this;
    }

    /**
     * Get location
     *
     * @param void
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->_location;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Github_Model_User
     */
    public function setLocation($location)
    {
        $this->_location = (string)$location;
        return $this;
    }

    /**
     * Get email
     *
     * @param void
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Github_Model_User
     */
    public function setEmail($email)
    {
        $this->_email = (string)$email;
        return $this;
    }

    /**
     * Get hireable
     *
     * @param void
     *
     * @return bool
     */
    public function getHireable()
    {
        return $this->_hireable;
    }

    /**
     * Set hireable
     *
     * @param bool $hireable
     *
     * @return Github_Model_User
     */
    public function setHireable($hireable)
    {
        $this->_hireable = (bool)$hireable;
        return $this;
    }

    /**
     * Get bio
     *
     * @param void
     *
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * Set bio
     *
     * @param $bio
     *
     * @return Github_Model_User
     */
    public function setBio($bio)
    {
        $this->_bio = (string)$bio;
        return $this;
    }

    /**
     * Get public repos
     *
     * @param void
     *
     * @return int
     */
    public function getPublicRepos()
    {
        return $this->_public_repos;
    }

    /**
     * Set public repos
     *
     * @param $public_repos
     *
     * @return Github_Model_User
     */
    public function setPublicRepos($public_repos)
    {
        $this->_public_repos = (int)$public_repos;
        return $this;
    }

    /**
     * Get public gists
     *
     * @param void
     *
     * @return int
     */
    public function getPublicGists()
    {
        return $this->_public_gists;
    }

    /**
     * Set public gists
     *
     * @param int $public_gists
     *
     * @return Github_Model_User
     */
    public function setPublicGists($public_gists)
    {
        $this->_public_gists = (int)$public_gists;
        return $this;
    }

    /**
     * Get followers
     *
     * @param void
     *
     * @return int
     */
    public function getFollowers()
    {
        return $this->_followers;
    }

    /**
     * Set followers
     *
     * @param int $followers
     *
     * @return Github_Model_User
     */
    public function setFollowers($followers)
    {
        $this->_followers = (int)$followers;
        return $this;
    }

    /**
     * Get following
     *
     * @param void
     *
     * @return int
     */
    public function getFollowing()
    {
        return $this->_following;
    }

    /**
     * Set following
     *
     * @param int $following
     *
     * @return Github_Model_User
     */
    public function setFollowing($following)
    {
        $this->_following = (int)$following;
        return $this;
    }

    /**
     * Get html url
     *
     * @param void
     *
     * @return string
     */
    public function getHtmlUrl()
    {
        return $this->_html_url;
    }

    /**
     * Set html url
     *
     * @param  string $html_url
     *
     * @return Github_Model_User
     */
    public function setHtmlUrl($html_url)
    {
        $this->_html_url = (string)$html_url;
        return $this;
    }

    /**
     * Get created at
     *
     * @param void
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    /**
     * Set created at
     *
     * @param $created_at
     *
     * @return Github_Model_User
     */
    public function setCreatedAt($created_at)
    {
        $this->_created_at = (string)$created_at;
        return $this;
    }

    /**
     * Get type
     *
     * @param void
     *
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * Set type
     *
     * @param $type
     *
     * @return Github_Model_User
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }


}