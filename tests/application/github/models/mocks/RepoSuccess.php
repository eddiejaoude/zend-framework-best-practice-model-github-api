<?php
/**
 * Class Test_Github_Model_Mock_RepoSuccess
 */
class Test_Github_Model_Mock_RepoSuccess implements Github_Model_Dao_Interface, Github_Model_Dao_RepoInterface
{
    /**
     * @return Test_Github_Model_Mock_RepoSuccess
     */
    public function getDatasource() {
        return $this;
    }

    /**
     * Find by username
     *
     * @param Github_Model_Entity_User $user
     *
     * @return array
     */
    public function findByUsername(Github_Model_Entity_User $user)
    {
        $file = file_get_contents(APPLICATION_TESTS . '/github/models/mocks/json/findByUsername.json');
        $json = Zend_Json::decode($file, Zend_Json::TYPE_OBJECT);
        return $json;
    }

    /**
     * Find tags
     *
     * @param Github_Model_Entity_Repo $repo
     *
     * @return array
     */
    public function findTags(Github_Model_Entity_Repo $repo) {
        $file = file_get_contents(APPLICATION_TESTS . '/github/models/mocks/json/findTags.json');
        $json = Zend_Json::decode($file, Zend_Json::TYPE_OBJECT);
        return $json;
    }

}