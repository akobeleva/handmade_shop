<?php

namespace app\controllers;

use app\models\ProductModel;
use app\views\AdminView;
use core\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->view = new AdminView();
    }

    public function showAdminPage()
    {
        $this->view->renderAdminView();
    }

    public function getAllProducts()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: GET");
        header("Content-Type: application/json; charset=UTF-8");
        header(
            "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"
        );

        $products = ProductModel::getAll();
        $productsArray = [];
        if (isset($products)) {
            foreach ($products as $product) {
                $productsArray[]
                    = [
                    "id"             => $product->getId(),
                    "subcategory_id" => $product->getSubcategoryId(),
                    "name"           => $product->getName(),
                    "price"          => $product->getPrice(),
                    "description"    => $product->getDescription(),
                    "seller_id"      => $product->getSellerId(),
                    "image_name"     => $product->getImageName()
                ];
            }
            echo json_encode(["success" => 1, "products" => $productsArray]);
        } else {
            echo json_encode(["success" => 0]);
        }
    }
}