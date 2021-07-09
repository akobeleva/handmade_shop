<?php

namespace app\controllers;

use app\models\CategoryModel;
use core\Controller;
use core\View;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new CategoryModel();
    }

    public function indexAction()
    {
        $data = $this->model->getAllRows();
        echo $this->view->renderTemplate(
            'MenuView.php',
            ['menuItems' => $data]
        );
    }
}