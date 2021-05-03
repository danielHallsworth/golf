<?php

namespace Golf\Factory;
use Golf\Controller\WriteController;
use Golf\Form\PostForm;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class WriteControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $formManager = $container->get("FormElementManager");
        return new WriteController(
            $formManager->get(PostForm::class)
        );
    }

}