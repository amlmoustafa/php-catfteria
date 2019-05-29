<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../model/Order.php';
if (isset($_POST)) {
//    var_dump($_POST);
    $searchResult ="";
    $result = array();
    $products = array();
    $result['flag'] = 0;
    $valueToSearch = trim($_POST['selectValue']);
    if ($valueToSearch != '') {
        $model = new Order();
        $products = $model->searchForProducts($valueToSearch);
//        var_dump($result);
    }
    if (empty($products)) {
        $result['flag'] = 1;
    }
    if (count($products) > 0) {
        foreach ($products as $productcatgorie) {
            $searchResult .= "<div class = 'row products'>"
                    . "<div class ='col-md-6' >"
                    . "<div class = 'product pointer singleProduct' data-id ='" .
                    $productcatgorie['id'] . "'> <img src = '' alt = 'tomato salad'><div class = 'description'>" .
                    " <h3> " . $productcatgorie['name'] . "</h3>
                <span>" . $productcatgorie['price'] . " </span> 
            </div>
              </div>
             </div>
            </div>";
        }
        $result['view'] = $searchResult;
    }
    echo json_encode($result);
}
    ?>
   
   

