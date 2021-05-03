<?php

namespace Golf\Controller;

use Golf\Form\PostForm;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class WriteController extends AbstractActionController
{

    /**
     * @var PostForm
     */
    private $form;

    public function __construct(PostForm $form)
    {
        $this->form = $form;
    }

    public function addAction()
    {
        return new ViewModel(
            [
                "form" => $this->form,
            ]
        );
    }

}