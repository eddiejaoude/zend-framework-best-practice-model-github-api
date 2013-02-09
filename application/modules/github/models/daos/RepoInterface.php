<?php
/**
 * Class Github_Model_Dao_RepoInterface
 */
interface Github_Model_Dao_RepoInterface {

    /**
     * @param Github_Model_Entity_User $user
     *
     * @return array
     */
    public function findByUsername(Github_Model_Entity_User $user);

    /**
     * @param Github_Model_Entity_Repo $repoEntityRequest
     *
     * @return array
     */
    public function findTags(Github_Model_Entity_Repo $repoEntityRequest);
}