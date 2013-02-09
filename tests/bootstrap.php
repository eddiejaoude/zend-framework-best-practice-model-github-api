<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// mocks
defined('APPLICATION_TESTS')
    || define('APPLICATION_TESTS', realpath(dirname(__FILE__) . '/application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

require_once 'Zend/Loader/Autoloader/Resource.php';
$loader = new Zend_Loader_Autoloader_Resource(
    array(
        'basePath' => APPLICATION_PATH . '/modules/github',
        'namespace' => 'Github'
    )
);
$loader->addResourceType('entities', 'models/entities', 'Model_Entity');
$loader->addResourceType('daos', 'models/daos', 'Model_Dao');
$loader->addResourceType('mappers', 'models/mappers', 'Model_Mapper');
$loader->addResourceType('services', 'models/services', 'Model_Service');
$loader->addResourceType('services-exceptions', 'models/services/exceptions', 'Model_Service_Exception');


abstract class BaseTestCase extends Zend_Test_PHPUnit_ControllerTestCase {
    
    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
        return;
    }
    
}