<?php

class Github_Model_Datasource {

    private $_client;
    private $_registry;
    private $_cache;

    public function __construct(Zend_Registry $registry) {
        $this->setRegistry($registry);
    }

    public function setClient() {
        if (null === $this->_registry) {
            $this->getRegistry();
        }
        $this->_client = new Zend_Rest_Client($this->_registry->github->api->url);
        return $this;
    }

    public function getClient() {
        return $this->_client;
    }

    public function getRegistry() {
        if (null === $this->_registry) {
            $this->setRegistry(Zend_Registry::getInstance());
        }
        return $this->_registry;
    }

    public function setRegistry(Zend_Registry $registry) {
        $this->_registry = $registry;
        $this->setClient();
        return $this;
    }

    public function setCache(Zend_Cache $cache = null) {
        if (null === $this->_registry) {
            $this->getRegistry();
        }
        if (null !== $cache) {
            $this->_registry->config->cache = $cache;
        }

        $this->_cache = Zend_Cache::factory(
            'core',
            'file',
            array(
                'lifetime' => 7200, // cache lifetime of 2 hours
                'automatic_serialization' => true
            ),
            array(
                'cache_dir' => '/tmp/'
            )
        );
        return $this;
    }

    public function getCache() {
        if (null === $this->_cache) {
            $this->setCache();
        }
        return $this->_cache;
    }

}