<?php

class Github_Model_Mapper_Base {

    protected function sanatizeCacheName($name) {
        $search = array('/-/');
        $replace = array('_');
        $sanatizedName = preg_replace($search, $replace, $name);
        return $sanatizedName;
    }


}