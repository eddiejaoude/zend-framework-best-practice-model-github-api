<?php

class Test_Github_Model_Mock_RepoNoResults implements Github_Model_Dao_Interface, Github_Model_Dao_RepoInterface
{

    public function getDatasource() {}

    public function findByUsername(Github_Model_Entity_User $user)
    {
        $file = file_get_contents(APPLICATION_TESTS . '/github/models/mocks/json/noResults.json');
        $json = Zend_Json::decode($file, Zend_Json::TYPE_OBJECT);
        return $json;
    }

    public function findTags(Github_Model_Entity_Repo $repo)
    {
        $file = file_get_contents(APPLICATION_TESTS . '/github/models/mocks/json/noResults.json');
        $json = Zend_Json::decode($file, Zend_Json::TYPE_OBJECT);
        return $json;
    }

}