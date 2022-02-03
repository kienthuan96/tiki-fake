<?php 
class CartController {
    protected $cartStorage;
	function __construct() {
		$this->cartStorage = new CartStorage();
	}
    function index() {
        $cart = $this->cartStorage->fetch();
        // $a = $this->cartStorage->store($cart);
        $cartItems = $cart->convertToArray();
        $items = $cartItems["items"];
        require "views/cart/cart.php";
    }
    function add() {
        $product_id = $_GET["product_id"];
        $qty = $_GET["qty"];
        $productRepository = new ProductRepository();
		$product = $productRepository->find($product_id);
        $item = array(
			"product_id" => $product_id,
			"name" => $product->getName(),
			"img" => $product->getFeaturedImage(),
			"qty" => $qty,
			"unit_price" => $product->getPrice(),
			"total_price" => $product->getPrice() * $qty,
		);
        $cart = $this->cartStorage->fetch();
        $cart->addProduct($product_id, $qty, $item);
        $this->cartStorage->store($cart);
    }

    function delete() {
        $product_id = $_GET["product_id"];
        $cart = $this->cartStorage->fetch();
        $cart->deleteProduct($product_id);
        $this->cartStorage->store($cart);
        $cartItems = $cart->convertToArray();
        $items = $cartItems["items"];
        require "views/cart/cartItems.php";
    }

    function checkout() {
        require "views/cart/checkout.php";
    }
}
?>