<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 06/04/2016
 * Time: 23:00
 */

namespace AppBundle\Infrastructure\DependencyInjection\Compiler;

use Symfony\Component\Finder\Finder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\Config\Resource\DirectoryResource;
use Symfony\Component\HttpFoundation\File\File;

class ValidatorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $validatorBuilder = $container->getDefinition('validator.builder');
        $validatorFiles = array();
        $finder = new Finder();

        /** @var File $file */
        foreach ($finder->files()->in(__DIR__ . '/../../Resources/config/validation') as $file) {
            $validatorFiles[] = $file->getRealPath();
        }

        $validatorBuilder->addMethodCall('addYamlMappings', array($validatorFiles));

        // add resources to the container to refresh cache after updating a file
        $container->addResource(new DirectoryResource(__DIR__ . '/../../Resources/config/validation'));
    }
}