<?php

namespace Golf;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Golf\GolfController;


return [
    "router" => [
        "routes" => [
            "home" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/",
                    "defaults" => [
                        "controller" =>  GolfController::class,
                        "action" => "index",
                    ],
                ],
            ],
        ],
    ],
];