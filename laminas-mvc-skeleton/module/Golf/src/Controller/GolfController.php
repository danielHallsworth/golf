<?php

namespace Golf;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

Class GolfController extends AbstractActionController {

    public function indexAction()
    {
        return new ViewModel();
    }
}