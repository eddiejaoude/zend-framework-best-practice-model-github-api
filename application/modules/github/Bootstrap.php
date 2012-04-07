<?php

/**
 * Application bootstrap
 *
 * @author Eddie Jaoude
 * @package Github
 *
 */
class Github_Bootstrap extends Zend_Application_Module_Bootstrap {
   
    /**
     * Configuration
     *
     * @author          Eddie Jaoude
     * @param           void
     * @return          void
     *
     */
    protected function _initConfig() {
        // get config
        $config = new Zend_Config_Ini(APPLICATION_PATH .
                        DIRECTORY_SEPARATOR . 'modules' . 
                        DIRECTORY_SEPARATOR . 'github' . 
                        DIRECTORY_SEPARATOR . 'configs' . 
                        DIRECTORY_SEPARATOR . 'github.ini', APPLICATION_ENV);

        // save new database adapter to registry
        Zend_Registry::set('github', $config);
    }
}

