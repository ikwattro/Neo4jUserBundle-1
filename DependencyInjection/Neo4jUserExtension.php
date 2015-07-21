<?php
namespace UserBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class Neo4jUserExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $conf = $this->remapParametersNamespaces($config);
        foreach($conf as $key => $value)
        {
            $container->setParameter($key, $value);
        }
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
    
    public function getConfigNamespace()
    {
        return 'neo4j_user';
    }
    
    public function remapParametersNamespaces(array $config = array())
    {
        $conf = array();
        foreach($config as $key => $value) {
            $configKey = $this->getConfigNamespace().'.'.$key;
            $configValue = $value;
            $conf[$configKey] = $configValue;
        }
        return $conf;
    }
}