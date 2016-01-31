<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class SearcherItemsCompilerPass
 */
class SearcherItemsCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('searcher_registry')) {
            return;
        }

        $definition = $container->getDefinition('searcher_registry');

        $taggedServices = $container->findTaggedServiceIds(
            'searcher_item'
        );

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addItem',
                array(new Reference($id))
            );
        }
    }
} 