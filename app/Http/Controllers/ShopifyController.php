<?php

namespace App\Http\Controllers;

use App\Traits\ThirdPartyTrait;
use Illuminate\Http\Request;
use PHPShopify\ShopifySDK;
use Utils\Twilio;

class ShopifyController extends Controller
{
    //


    use ThirdPartyTrait;

    public $config = array(
        'ShopUrl' => 'jaremsalonga.myshopify.com',
        'ApiKey' => '47aa40d7ca43f43920f39ac041a3967d',
        'Password' => '04bc00087abff48212c573e24c6c4ffc',
    );

    public $shopify;

    public $query;

    public function __construct()
    {
      $this->shopify = ShopifySDK::config($this->config);

      $this->query = $this->shopify;
    }

    public function getProduct(string $id = '') : array {

        $getProducts = $id ? $this->query->Product($id)->get() : $this->query->Product->get();
        
        return $getProducts;
    }

    public function getOrder(string $id ='') : array {
        
        $getOrders = $id ? $this->query->Order($id)->get() : $this->query->Order->get();

        return $getOrders;
    }

    public function postProduct(Request $request = NULL) {
        $filterRequest = empty($request) ? array(
                "title" => "Untitled",
                "body_html" => "<strong>Lorem ipsum!</strong>",
                "vendor" => "Foo Bar",
                "product_type" => "Test Product",
                "tags" => [
                  "Barnes & Noble",
                  "John's Fav",
                  "\"Big Air\""
                ]
        ) : $request;

        $postProducts = $this->query->Product->post($filterRequest);

        $twilio = new Twilio;

        ['title' => $title, 'vendor' => $vendor] = $postProducts;

        $body = "Thank you for purchasing {$title} from {$vendor} hope to see you again @ https://jaremsalonga.myshopify.com/";

        $twilio->sendWhatsAppSMS('+14155238886', '+639354244394', $body);

        return $postProducts;
    }

    public function newOrder(Request $request = NULL) {

        $filterRequest = empty($request) ? array (
            "email" => "john.doe@example.com",
            "fulfillment_status" => "unfulfilled",
            "line_items" => [
              [
                  "variant_id" => 31577104056451,
                  "quantity" => 5
              ]
            ]
        ) : $request;

        $newOrder = $this->query->Order->post($filterRequest);

        return $newOrder;
    }
}
