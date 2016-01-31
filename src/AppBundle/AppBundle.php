<?php

namespace AppBundle;

use AppBundle\DependencyInjection\SearcherItemsCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container){

        parent::build($container);

        $container->addCompilerPass(new SearcherItemsCompilerPass());
    }

}
