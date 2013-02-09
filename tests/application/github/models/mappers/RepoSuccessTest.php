<?php

require_once(APPLICATION_TESTS . '/github/models/mocks/RepoSuccess.php');
class Test_Github_Model_Mapper_RepoSuccessTest extends BaseTestCase {

    /**
     * Mapper object
     *
     * @author Eddie Jaoude
     * @param object $model
     *
     */
    private $_mapper;

    /**
     * Dao
     *
     * @var Test_Github_Model_Mock_RepoSuccess
     */
    private $_dao;

    /**
     * @var array
     */
    private $_mock;

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

        //$dao = new Github_Model_Dao_Repo();
        $this->_dao = new Test_Github_Model_Mock_RepoSuccess();
        $this->_mock = $this->_dao->findByUsername(new Github_Model_Entity_User(array('username' => '')));

        $this->_mapper = new Github_Model_Mapper_Repo($this->_dao);
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
        $this->assertEquals(true, is_object($this->_mapper));
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
        $result = $this->_mapper->findByUsername(new Github_Model_Entity_User(array('username' => $username)));

        $this->assertEquals(true, is_object($result));
        $this->assertEquals(true, $result instanceof Github_Model_Entity_User);
        $this->assertEquals(true, is_string($result->getUsername()));
        $this->assertEquals($username, $result->getUsername());

        foreach ($result->getRepos() as $k=>$v) {
            $this->assertEquals(true, is_object($v));
            $this->assertEquals(true, $v instanceof Github_Model_Entity_Repo);
            $this->assertEquals(true, is_string($v->getName()));
            $this->assertEquals($this->_mock[$k]->name, $v->getName());
            $this->assertEquals(true, is_string($v->getDescription()));
            $this->assertEquals($this->_mock[$k]->description, $v->getDescription());
            $this->assertEquals(true, is_string($v->getHomepage()));
            $this->assertEquals($this->_mock[$k]->homepage, $v->getHomepage());
            $this->assertEquals(true, is_string($v->getUrl()));
            $this->assertEquals($this->_mock[$k]->url, $v->getUrl());
            $this->assertEquals(true, is_object($v->getOwner()));
            $this->assertEquals(true, is_string($v->getOwner()->getUsername()));
            $this->assertEquals($this->_mock[$k]->owner->login, $v->getOwner()->getUsername());
            $this->assertEquals(true, is_int($v->getOwner()->getId()));
            $this->assertEquals($this->_mock[$k]->owner->id, $v->getOwner()->getId());
            $this->assertEquals(true, is_string($v->getOwner()->getAvatarUrl()));
            $this->assertEquals($this->_mock[$k]->owner->avatar_url, $v->getOwner()->getAvatarUrl());
            $this->assertEquals(true, is_string($v->getOwner()->getGravatarId()));
            $this->assertEquals($this->_mock[$k]->owner->gravatar_id, $v->getOwner()->getGravatarId());
            $this->assertEquals(true, is_string($v->getOwner()->getUrl()));
            $this->assertEquals($this->_mock[$k]->owner->url, $v->getOwner()->getUrl());
            $this->assertEquals(true, is_string($v->getHtmlUrl()));
            $this->assertEquals($this->_mock[$k]->html_url, $v->getHtmlUrl());
            $this->assertEquals(true, is_string($v->getCloneUrl()));
            $this->assertEquals($this->_mock[$k]->clone_url, $v->getCloneUrl());
            $this->assertEquals(true, is_string($v->getGitUrl()));
            $this->assertEquals($this->_mock[$k]->git_url, $v->getGitUrl());
            $this->assertEquals(true, is_string($v->getSshUrl()));
            $this->assertEquals($this->_mock[$k]->ssh_url, $v->getSshUrl());
            $this->assertEquals(true, is_string($v->getSvnUrl()));
            $this->assertEquals($this->_mock[$k]->svn_url, $v->getSvnUrl());
            $this->assertEquals(true, is_bool($v->getPrivate()));
            $this->assertEquals($this->_mock[$k]->private, $v->getPrivate());
            $this->assertEquals(true, is_bool($v->getFork()));
            $this->assertEquals($this->_mock[$k]->fork, $v->getFork());
            $this->assertEquals(true, is_int($v->getForks()));
            $this->assertEquals($this->_mock[$k]->forks, $v->getForks());
            $this->assertEquals(true, is_int($v->getWatchers()));
            $this->assertEquals($this->_mock[$k]->watchers, $v->getWatchers());
            $this->assertEquals(true, is_int($v->getSize()));
            $this->assertEquals($this->_mock[$k]->size, $v->getSize());

            if (null != $v->getMasterBranch()) {
                $this->assertEquals(true, is_string($v->getMasterBranch()));
                $this->assertEquals($this->_mock[$k]->master_branch, $v->getMasterBranch());
            }

            $this->assertEquals(true, is_int($v->getOpenIssues()));
            $this->assertEquals($this->_mock[$k]->open_issues, $v->getOpenIssues());
            $this->assertEquals(true, is_string($v->getPushedAt()));
            $this->assertEquals($this->_mock[$k]->pushed_at, $v->getPushedAt());
            $this->assertEquals(true, is_string($v->getCreatedAt()));
            $this->assertEquals($this->_mock[$k]->created_at, $v->getCreatedAt());
            $this->assertEquals(true, is_string($v->getUpdatedAt()));
            $this->assertEquals($this->_mock[$k]->updated_at, $v->getUpdatedAt());

        }
    }

//    /**
//     * Get tags
//     *
//     * @author Eddie Jaoude
//     * @param null
//     * @return null
//     *
//     */
//    public function testGetTags() {
//        $username = 'eddiejaoude';
//        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
//        $result = $this->_mapper->findTags(
//            new Github_Model_Entity_Repo(
//                array(
//                    'name' => $repo,
//                    'owner' => new Github_Model_Entity_User(
//                        array(
//                            'username' => $username
//                        )
//                    ),
//                )
//            )
//        );
//
//        $this->assertEquals(true, is_array($result));
//        foreach ($result as $k=>$v) {
//            $this->assertEquals(true, $v instanceof Github_mapper_Entity_Tag);
//            $this->assertEquals(true, is_string($v->getName()));
//            $this->assertEquals(true, is_string($v->getSha()));
//            $this->assertEquals(true, is_string($v->getUrl()));
//            $this->assertEquals(true, is_string($v->getZipballUrl()));
//            $this->assertEquals(true, is_string($v->getTarballUrl()));
//        }
//    }
//
//    /**
//     * Get branches
//     *
//     * @author Eddie Jaoude
//     * @param null
//     * @return null
//     *
//     */
//    public function testGetBranches() {
//        $username = 'eddiejaoude';
//        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
//        $result = $this->_mapper->getBranches(
//            new Github_Model_Entity_User(array('username' => $username)),
//            new Github_Model_Entity_Repo(array('name' => $repo))
//        );
//
//        $this->assertEquals(true, is_array($result));
//        foreach ($result as $k=>$v) {
//            $this->assertEquals(true, $v instanceof Github_mapper_Entity_Branch);
//            $this->assertEquals(true, is_string($v->getName()));
//            $this->assertEquals(true, is_string($v->getSha()));
//            $this->assertEquals(true, is_string($v->getUrl()));
//        }
//    }
//
//    /**
//     * Get languages
//     *
//     * @author Eddie Jaoude
//     * @param null
//     * @return null
//     *
//     */
//    public function testGetLanguages() {
//        $username = 'eddiejaoude';
//        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
//        $result = $this->_mapper->getLanguages(
//            new Github_Model_Entity_User(array('username' => $username)),
//            new Github_Model_Entity_Repo(array('name' => $repo))
//        );
//
//        $this->assertEquals(true, is_array($result));
//        foreach ($result as $k=>$v) {
//            $this->assertEquals(true, $v instanceof Github_mapper_Entity_Language);
//            $this->assertEquals(true, is_string($v->getName()));
//            $this->assertEquals(true, is_int($v->getSize()));
//        }
//    }
//
//    /**
//     * Get collaborators
//     *
//     * @author Eddie Jaoude
//     * @param null
//     * @return null
//     *
//     */
//    public function testGetCollaborators() {
//        $username = 'eddiejaoude';
//        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
//        $result = $this->_mapper->getCollaborators(
//            new Github_Model_Entity_User(array('username' => $username)),
//            new Github_Model_Entity_Repo(array('name' => $repo))
//        );
//
//        $this->assertEquals(true, is_array($result));
//        foreach ($result as $k=>$v) {
//            $this->assertEquals(true, $v instanceof Github_Model_Entity_User);
//            $this->assertEquals(true, is_string($v->getUsername()));
//            $this->assertEquals(true, is_string($v->getAvatarUrl()));
//            $this->assertEquals(true, is_string($v->getGravatarId()));
//            $this->assertEquals(true, is_string($v->getUrl()));
//            $this->assertEquals(true, is_int($v->getId()));
//        }
//    }
//
//    /**
//     * Find by user
//     *
//     * @author Eddie Jaoude
//     * @param null
//     * @return null
//     *
//     */
//    public function testGetForks() {
//        $username = 'eddiejaoude';
//        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
//        $result = $this->_mapper->getForks(
//            new Github_Model_Entity_User(array('username' => $username)),
//            new Github_Model_Entity_Repo(array('name' => $repo))
//        );
//
//        $this->assertEquals(true, is_array($result));
//
//        foreach ($result as $k=>$v) {
//            $this->assertEquals(true, is_object($v));
//            $this->assertEquals(true, $v instanceof Github_Model_Entity_Repo);
//            $this->assertEquals(true, is_string($v->getName()));
//            $this->assertEquals(true, is_string($v->getDescription()));
//            $this->assertEquals(true, is_string($v->getHomepage()));
//            $this->assertEquals(true, is_string($v->getUrl()));
//            $this->assertEquals(true, is_object($v->getOwner()));
//            $this->assertEquals(true, is_string($v->getOwner()->getUsername()));
//            $this->assertEquals(true, is_int($v->getOwner()->getId()));
//            $this->assertEquals(true, is_string($v->getOwner()->getAvatarUrl()));
//            $this->assertEquals(true, is_string($v->getOwner()->getGravatarId()));
//            $this->assertEquals(true, is_string($v->getOwner()->getUrl()));
//            $this->assertEquals(true, is_string($v->getHtmlUrl()));
//            $this->assertEquals(true, is_string($v->getCloneUrl()));
//            $this->assertEquals(true, is_string($v->getGitUrl()));
//            $this->assertEquals(true, is_string($v->getSshUrl()));
//            $this->assertEquals(true, is_string($v->getSvnUrl()));
//            $this->assertEquals(true, is_bool($v->getPrivate()));
//            $this->assertEquals(true, is_bool($v->getFork()));
//            $this->assertEquals(true, is_int($v->getForks()));
//            $this->assertEquals(true, is_int($v->getWatchers()));
//            $this->assertEquals(true, is_int($v->getSize()));
//            if (null != $v->getMasterBranch()) {
//                $this->assertEquals(true, is_string($v->getMasterBranch()));
//            }
//            $this->assertEquals(true, is_int($v->getOpenIssues()));
//            $this->assertEquals(true, is_string($v->getPushedAt()));
//            $this->assertEquals(true, is_string($v->getCreatedAt()));
//            $this->assertEquals(true, is_string($v->getUpdatedAt()));
//
//        }
//    }
//
//    /**
//     * Get watchers
//     *
//     * @author Eddie Jaoude
//     * @param null
//     * @return null
//     *
//     */
//    public function testGetWatchers() {
//        $username = 'eddiejaoude';
//        $repo = 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
//        $result = $this->_mapper->getWatchers(
//            new Github_Model_Entity_User(array('username' => $username)),
//            new Github_Model_Entity_Repo(array('name' => $repo))
//        );
//
//        $this->assertEquals(true, is_array($result));
//        foreach ($result as $k=>$v) {
//            $this->assertEquals(true, $v instanceof Github_Model_Entity_User);
//            $this->assertEquals(true, is_string($v->getUsername()));
//            $this->assertEquals(true, is_string($v->getAvatarUrl()));
//            $this->assertEquals(true, is_string($v->getGravatarId()));
//            $this->assertEquals(true, is_string($v->getUrl()));
//            $this->assertEquals(true, is_int($v->getId()));
//        }
//    }
//
//    /**
//     * Get watchers
//     *
//     * @author Eddie Jaoude
//     * @param null
//     * @return null
//     *
//     */
//    public function testGetPullRequests() {
//        $username = 'padraic'; // 'eddiejaoude';
//        $repo = 'mutagenesis'; // 'Zend-Framework--Doctrine-ORM--PHPUnit--Ant--Jenkins-CI--TDD-';
//        $result = $this->_mapper->getPullRequests(
//            new Github_Model_Entity_User(array('username' => $username)),
//            new Github_Model_Entity_Repo(array('name' => $repo))
//        );
//
//        $this->assertEquals(true, is_array($result));
//
//        foreach($result as $k=>$v) {
//            $this->assertEquals(true, is_string($v->getUrl()));
//            $this->assertEquals(true, is_string($v->getHtmlUrl()));
//            $this->assertEquals(true, is_string($v->getDiffUrl()));
//            $this->assertEquals(true, is_string($v->getPatchUrl()));
//            $this->assertEquals(true, is_string($v->getIssueUrl()));
//            $this->assertEquals(true, is_int($v->getNumber()));
//            $this->assertEquals(true, is_string($v->getState()));
//            $this->assertEquals(true, is_string($v->getTitle()));
//            $this->assertEquals(true, is_string($v->getBody()));
//            $this->assertEquals(true, !is_null($v->getCreatedAt()));
//            $this->assertEquals(true, !is_null($v->getUpdatedAt()));
//            $this->assertEquals(true, is_string($v->getClosedAt()));
//            $this->assertEquals(true, is_string($v->getMergedAt()));
//            $this->assertEquals(true, is_string($v->getLinkSelfHref()));
//            $this->assertEquals(true, is_string($v->getLinkHtmlHref()));
//            $this->assertEquals(true, is_string($v->getLinkCommentsHref()));
//            $this->assertEquals(true, is_string($v->getLinkReviewCommentsHref()));
//        }
//    }
//
}

