<?php

/**
 * Github model service repo
 *
 * @author  Eddie Jaoude
 * @package Github
 */
class Github_Model_Service_Repo extends Github_Model_Service_Core
{

    /**
     * Find by username
     *
     * @param $username
     *
     * @throws Github_Model_Service_Exception_Empty
     * @internal param string $user
     *
     * @return Github_Model_Entity_User
     */
    public function findByUsername($username)
    {
        if (empty($username)) {
            throw new Github_Model_Service_Exception_Empty('$username is required & cannot be empty.');
        }

        $userEntity = new Github_Model_Entity_User();
        $userEntity->setUsername($username);

        $user = $this->getMapper()->findByUsername($userEntity);
        return $user;
    }



}