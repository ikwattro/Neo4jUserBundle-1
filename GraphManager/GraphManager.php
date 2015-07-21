<?php
namespace UserBundle\GraphManager;
use HireVoice\Neo4j\EntityManager;
use HireVoice\Neo4j\Configuration;
class GraphManager extends EntityManager
{
	public function __construct($host, $port, $proxy_dir, $username = null, $password = null)
	{
        $configuration = new Configuration(array(
            'host' => 'localhost',
            'port' => '7474',
            'proxy_dir' => $proxy_dir,
            'username' => $username,
            'password' => $password,
        ));
		parent::__construct($configuration);
    }
}