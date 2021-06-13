<?php

namespace User\Controller;

use Laminas\View\Model\ViewModel;


class UserController {

    public function indexAction()
    {
        return new ViewModel();
    }
}