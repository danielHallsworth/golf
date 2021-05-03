<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Golf\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Golf\Model\PlayerTable;

class GolfController extends AbstractActionController
{
    private $table;

    public function __construct(PlayerTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel(
            [
                "players" => $this->table->fetchAll(),
            ]
        );
    }
}
