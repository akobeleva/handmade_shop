<?php

namespace app\controllers;

use app\models\CatalogModel;
use core\Controller;
use core\View;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new CatalogModel();
    }

    public function indexAction()
    {
        if (!$_GET) {
            $data = $this->model->getAllRows();
            $vars['title'] = 'Каталог';
            $vars['catalogItems'] = $data;
            $this->view->renderCatalogView($vars);
        } else {
            $this->categoryAction($_GET['category']);
        }
    }

    private function categoryAction($categoryId)
    {
        $subCatController = new SubcategoryController();
        $subcategories = $subCatController->subcategoryAction($categoryId);
        $this->view->renderLeftMenuPageView($subcategories);
    }
}