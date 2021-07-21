<?php

namespace app\controllers;

use app\views\PageView;
use core\Controller;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->view = new PageView();
    }

    public function showCatalogPage()
    {
        $categoryController = new CategoryController();
        $categories = $categoryController->getCategories();
        if (!isset($categories)) {
            $this->showNotFoundPage();
            return;
        }
        $catalogItems = [];
        foreach ($categories as $category) {
            $catalogItems[$category->getId()]['entity'] = $category;
        }
        $vars['catalogItems'] = $catalogItems;
        $this->view->renderCatalogPage($vars);
    }
}