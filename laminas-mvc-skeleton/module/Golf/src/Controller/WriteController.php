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
        $request = $this->getRequest();
        $viewModel = new ViewModel(["form" => $this->form]);

        if (!$request->isPost()) {
            return $viewModel;
        }

        $this->form->setData($request->getPost());

        if (! $this->form->isValid()){
            return $viewModel;
        }

        $data = $this->form->getData()["post"];



    }

}