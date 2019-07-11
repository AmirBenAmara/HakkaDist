<?php
namespace AppBundle\DependencyInjection\Compiler;
/**
 * Created by PhpStorm.
 * User: Mlak
 * Date: 7/7/2019
 * Time: 2:54 PM
 */
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FOSUserOverridePass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $container->getDefinition('fos_user.listener.authentication')->setClass('AppBundle\EventListener\AuthenticationListener');
    }

}