<?php

namespace app\controllers;

use app\models\ProductModel;
use app\views\PageView;
use core\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->view = new PageView();
        $this->model = new ProductModel();
    }

    public function showProductPage($id)
    {
        $productController = new ProductController();
        $product = $productController->getProductById($id);
        $vars['product'] = $product[0];
        $this->view->renderProductPage($vars);
    }

    public function getProductsByCategoryId($categoryId): array
    {
        return $this->model->getProductsByCategoryId($categoryId);
    }

    public function getProductsBySubcategoryId($subcategoryId): array
    {
        return $this->model->getProductsBySubcategoryId($subcategoryId);
    }

    public function getProductById($productId): array
    {
        return $this->model->getRowById($productId);
    }
}