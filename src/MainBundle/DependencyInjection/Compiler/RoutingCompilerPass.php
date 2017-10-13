<?php

namespace MainBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RoutingCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->getDefinition('twig')->addMethodCall('addGlobal', [
            'menu_routing', $container->getParameter('forms_client.menu_routing')
        ]);
    }
}
