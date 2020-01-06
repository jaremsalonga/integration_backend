<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use PHPShopify\ShopifySDK;

class ShopifyActions extends Controller {

    public $config = array(
        'ShopUrl' => 'jaremsalonga.myshopify.com',
        'ApiKey' => '47aa40d7ca43f43920f39ac041a3967d',
        'Password' => '04bc00087abff48212c573e24c6c4ffc',
    );

    public $shopify;

    public $query;

    public $class;

    public function __construct($class)
    {
      $this->shopify = ShopifySDK::config($this->config);

      $this->query = $this->shopify;

      $this->class = $class;
    }

    public function fetchData($id = NULL) {

        $classExtendedTo = $this->class;
        
        $filterData = $id ? $this->query->$classExtendedTo($id)->get() : $this->query->$classExtendedTo->get();

        return $filterData;
    }

}

?>
