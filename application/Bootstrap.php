<?php

/**
 * Application bootstrap
 *
 * @author Eddie Jaoude
 * @package Application
 *
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

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
                        DIRECTORY_SEPARATOR . 'configs' .
                        DIRECTORY_SEPARATOR . 'application.ini', APPLICATION_ENV);

        // save new database adapter to registry
        Zend_Registry::set('config', $config);
    }

    /**
     * Logger
     * 
     * @EXAMPLE: $logger->log('This is a log message!', Zend_Log::INFO);
     * @EXAMPLE: $logger->info('This is a log message!');
     * 
     * From anywhere use...
     * @EXAMPLE: Zend_Registry::get('logger')->log('This is a log message!', Zend_Log::INFO);
     * 
     * EMERG   = 0;  // Emergency: system is unusable
     * ALERT   = 1;  // Alert: action must be taken immediately
     * CRIT    = 2;  // Critical: critical conditions
     * ERR     = 3;  // Error: error conditions
     * WARN    = 4;  // Warning: warning conditions
     * NOTICE  = 5;  // Notice: normal but significant condition
     * INFO    = 6;  // Informational: informational messages
     * DEBUG   = 7;  // Debug: debug messages
     * 
     * REQUIREMENTS: FirePHP & FireBug (firephp enabled & net tab enabled on firebug)
     *
     * @author          Eddie Jaoude
     * @param           void
     * @return          void
     *
     */
//    protected function _initLogger() {
//        // get registery
//        $registry = Zend_Registry::getInstance();
//
//        // log file
//        $error_log = $registry->config->logs->tmp_dir .
//                DIRECTORY_SEPARATOR .
//                $registry->config->logs->error_file;
//
//        // create logger object
//        if ('development' == APPLICATION_ENV) {
//            $writer = new Zend_Log_Writer_Firebug();
//        } else {
//            $writer = new Zend_Log_Writer_Stream($error_log);
//        }
//        $logger = new Zend_Log($writer);
//        Zend_Registry::set('logger', $logger);
//    }

}

