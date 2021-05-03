<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Golf;

use Golf\Controller\GolfController;
use Golf\Controller\WriteController;
use Golf\Factory\WriteControllerFactory;
use Laminas\Router\Http\Literal;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => GolfController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            "add" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/add",
                    "defaults" => [
                        "controller" => WriteController::class,
                        "action" => "add",
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            GolfController::class => InvokableFactory::class,
            WriteController::class => WriteControllerFactory::class,
            Model\PostCommand::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
