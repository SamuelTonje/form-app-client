<?php

namespace MainBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class MainExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('menu_routes.yml');

        $container->setParameter('main.api.url', $config['api']['url']);
        $container->setParameter('main.api.username', $config['api']['username']);
        $container->setParameter('main.api.password', $config['api']['password']);
        $container->setParameter('main.api.max_auth_try', $config['api']['max_auth_try']);
        $container->setParameter('main.api.verify_ssl', $config['api']['verify_ssl']);
    }
}
