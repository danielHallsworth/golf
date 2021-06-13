<?php

namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;


class UserController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }
}