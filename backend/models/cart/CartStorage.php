<?php 
class CartStorage {
	function store($cart) {
		//serialize: chuyển object to string
		$_SESSION["cart"] = serialize($cart);
	}

	function fetch() {
		if (empty($_SESSION["cart"])) {
			if (empty($_COOKIE["cart"])) {
				$cart = new Cart();
				return $cart;
			}
			//update session;
			$_SESSION["cart"] = $_COOKIE["cart"];
		}
		//unserialize: chuyển string to object
		$cart = unserialize($_SESSION["cart"]);
		return $cart;
	}

	function clear() {
		unset($_SESSION["cart"]);
	}
}
 ?>