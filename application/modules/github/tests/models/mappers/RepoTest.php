<?php

class Test_Github_Model_Mapper_RepoTest extends BaseTestCase {

    /**
     * Model object
     *
     * @author Eddie Jaoude
     * @param object $model
     *
     */
    private $_model;

    /**
     * Initialisation of config object
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function setup() {
        parent::setUp();
        $registry = Zend_Registry::getInstance();
        $datasource = new Github_Model_Datasource($registry);
        $this->_model = new Github_Model_Mapper_Repo($datasource);
    }

    /**
     * Test object creation
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testObjectInstance() {
        $this->assertEquals(true, is_object($this->_model));
    }
    
    /**
     * Find by username
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testFindByUsername() {
        $username = 'eddiejaoude';
        $result = $this->_model->findByUsername(new Github_Model_User(array('username' => $username)));

        $this->assertEquals(true, is_object($result));
        $this->assertEquals(true, $result instanceof Github_Model_User);
        $this->assertEquals(true, is_string($result->getUsername()));
        $this->assertEquals($username, $result->getUsername());

        foreach ($result->getRepos() as $k=>$v) {
            $this->assertEquals(true, is_object($v));
            $this->assertEquals(true, $v instanceof Github_Model_Repo);
            $this->assertEquals(true, is_string($v->getName()));
            $this->assertEquals(true, is_string($v->getDescription()));
            $this->assertEquals(true, is_string($v->getHomepage()));
            $this->assertEquals(true, is_string($v->getUrl()));
            $this->assertEquals(true, is_object($v->getOwner()));
            $this->assertEquals(true, is_string($v->getOwner()->getUsername()));
            $this->assertEquals(true, is_int($v->getOwner()->getId()));
            $this->assertEquals(true, is_string($v->getOwner()->getAvatarUrl()));
            $this->assertEquals(true, is_string($v->getOwner()->getGravatarId()));
            $this->assertEquals(true, is_string($v->getOwner()->getUrl()));
            $this->assertEquals(true, is_string($v->getHtmlUrl()));
            $this->assertEquals(true, is_string($v->getCloneUrl()));
            $this->assertEquals(true, is_string($v->getGitUrl()));
            $this->assertEquals(true, is_string($v->getSshUrl()));
            $this->assertEquals(true, is_string($v->getSvnUrl()));
            $this->assertEquals(true, is_bool($v->getPrivate()));
            $this->assertEquals(true, is_bool($v->getFork()));
            $this->assertEquals(true, is_int($v->getForks()));
            $this->assertEquals(true, is_int($v->getWatchers()));
            $this->assertEquals(true, is_int($v->getSize()));
            if (null != $v->getMasterBranch()) {
                $this->assertEquals(true, is_string($v->getMasterBranch()));
            }
            $this->assertEquals(true, is_int($v->getOpenIssues()));
            $this->assertEquals(true, is_string($v->getPushedAt()));
            $this->assertEquals(true, is_string($v->getCreatedAt()));
            $this->assertEquals(true, is_string($v->getUpdatedAt()));

        }
    }

    /**
     * Get tags
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetTags() {
        $username = 'eddiejaoude';
        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
        $result = $this->_model->getTags(
            new Github_Model_User(array('username' => $username)),
            new Github_Model_Repo(array('name' => $repo))
        );

        $this->assertEquals(true, is_array($result));
        foreach ($result as $k=>$v) {
            $this->assertEquals(true, $v instanceof Github_Model_Tag);
            $this->assertEquals(true, is_string($v->getName()));
            $this->assertEquals(true, is_string($v->getSha()));
            $this->assertEquals(true, is_string($v->getUrl()));
            $this->assertEquals(true, is_string($v->getZipballUrl()));
            $this->assertEquals(true, is_string($v->getTarballUrl()));
        }
    }

    /**
     * Get branches
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetBranches() {
        $username = 'eddiejaoude';
        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
        $result = $this->_model->getBranches(
            new Github_Model_User(array('username' => $username)),
            new Github_Model_Repo(array('name' => $repo))
        );

        $this->assertEquals(true, is_array($result));
        foreach ($result as $k=>$v) {
            $this->assertEquals(true, $v instanceof Github_Model_Branch);
            $this->assertEquals(true, is_string($v->getName()));
            $this->assertEquals(true, is_string($v->getSha()));
            $this->assertEquals(true, is_string($v->getUrl()));
        }
    }

    /**
     * Get languages
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetLanguages() {
        $username = 'eddiejaoude';
        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
        $result = $this->_model->getLanguages(
            new Github_Model_User(array('username' => $username)),
            new Github_Model_Repo(array('name' => $repo))
        );

        $this->assertEquals(true, is_array($result));
        foreach ($result as $k=>$v) {
            $this->assertEquals(true, $v instanceof Github_Model_Language);
            $this->assertEquals(true, is_string($v->getName()));
            $this->assertEquals(true, is_int($v->getSize()));
        }
    }

    /**
     * Get collaborators
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetCollaborators() {
        $username = 'eddiejaoude';
        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
        $result = $this->_model->getCollaborators(
            new Github_Model_User(array('username' => $username)),
            new Github_Model_Repo(array('name' => $repo))
        );

        $this->assertEquals(true, is_array($result));
        foreach ($result as $k=>$v) {
            $this->assertEquals(true, $v instanceof Github_Model_User);
            $this->assertEquals(true, is_string($v->getUsername()));
            $this->assertEquals(true, is_string($v->getAvatarUrl()));
            $this->assertEquals(true, is_string($v->getGravatarId()));
            $this->assertEquals(true, is_string($v->getUrl()));
            $this->assertEquals(true, is_int($v->getId()));
        }
    }

    /**
     * Find by user
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetForks() {
        $username = 'eddiejaoude';
        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
        $result = $this->_model->getForks(
            new Github_Model_User(array('username' => $username)),
            new Github_Model_Repo(array('name' => $repo))
        );

        $this->assertEquals(true, is_array($result));

        foreach ($result as $k=>$v) {
            $this->assertEquals(true, is_object($v));
            $this->assertEquals(true, $v instanceof Github_Model_Repo);
            $this->assertEquals(true, is_string($v->getName()));
            $this->assertEquals(true, is_string($v->getDescription()));
            $this->assertEquals(true, is_string($v->getHomepage()));
            $this->assertEquals(true, is_string($v->getUrl()));
            $this->assertEquals(true, is_object($v->getOwner()));
            $this->assertEquals(true, is_string($v->getOwner()->getUsername()));
            $this->assertEquals(true, is_int($v->getOwner()->getId()));
            $this->assertEquals(true, is_string($v->getOwner()->getAvatarUrl()));
            $this->assertEquals(true, is_string($v->getOwner()->getGravatarId()));
            $this->assertEquals(true, is_string($v->getOwner()->getUrl()));
            $this->assertEquals(true, is_string($v->getHtmlUrl()));
            $this->assertEquals(true, is_string($v->getCloneUrl()));
            $this->assertEquals(true, is_string($v->getGitUrl()));
            $this->assertEquals(true, is_string($v->getSshUrl()));
            $this->assertEquals(true, is_string($v->getSvnUrl()));
            $this->assertEquals(true, is_bool($v->getPrivate()));
            $this->assertEquals(true, is_bool($v->getFork()));
            $this->assertEquals(true, is_int($v->getForks()));
            $this->assertEquals(true, is_int($v->getWatchers()));
            $this->assertEquals(true, is_int($v->getSize()));
            if (null != $v->getMasterBranch()) {
                $this->assertEquals(true, is_string($v->getMasterBranch()));
            }
            $this->assertEquals(true, is_int($v->getOpenIssues()));
            $this->assertEquals(true, is_string($v->getPushedAt()));
            $this->assertEquals(true, is_string($v->getCreatedAt()));
            $this->assertEquals(true, is_string($v->getUpdatedAt()));

        }
    }

    /**
     * Get watchers
     *
     * @author Eddie Jaoude
     * @param null
     * @return null
     *
     */
    public function testGetWatchers() {
        $username = 'eddiejaoude';
        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
        $result = $this->_model->getWatchers(
            new Github_Model_User(array('username' => $username)),
            new Github_Model_Repo(array('name' => $repo))
        );

        $this->assertEquals(true, is_array($result));
        foreach ($result as $k=>$v) {
            $this->assertEquals(true, $v instanceof Github_Model_User);
            $this->assertEquals(true, is_string($v->getUsername()));
            $this->assertEquals(true, is_string($v->getAvatarUrl()));
            $this->assertEquals(true, is_string($v->getGravatarId()));
            $this->assertEquals(true, is_string($v->getUrl()));
            $this->assertEquals(true, is_int($v->getId()));
        }
    }

}

