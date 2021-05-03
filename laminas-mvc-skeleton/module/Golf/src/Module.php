<?php

namespace Golf;

use Golf\Controller\GolfController;
use Golf\Model\Player;
use Golf\Model\PlayerTable;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{

    public function getConfig(): array
    {
        return include __DIR__ . "/../config/module.config.php";
    }

    public function getServiceConfig()
    {
        return [
            "factories" => [
                PlayerTable::class => function ($container) {
                    $tableGateway = $container->get(PlayerTableGateway::class);
                    return new PlayerTable($tableGateway);
                },
                PlayerTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Player());
                    return new TableGateway("players", $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            "factories" => [
                GolfController::class => function ($container) {
                    return new GolfController(
                        $container->get(PlayerTable::class)
                    );
                },
            ],
        ];
    }

}