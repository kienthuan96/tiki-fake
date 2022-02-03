<?php 
class ProductController {
    function index() {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->fetchAll();

        $conds = null;
        $sort = null;
        $page = $_GET["page"] ?? 1;

        $item_per_page = 10;
        $start = ($page - 1) * $item_per_page;
        $limit = "$start, $item_per_page"; 

        $productRepository = new ProductRepository();
        $category_id = $_GET["category_id"] ?? null;
        if ($category_id) {
            $category_id = $_GET["category_id"];
            $conds = "category_id = $category_id";
            $category = $categoryRepository->find($category_id);
        }
        
        
        $search = $_GET["search"] ?? null;
        if ($search) {
            $conds = " name LIKE '%$search%'";
        }
        $products = $productRepository->fetchAll($conds, $sort);
        $totalPages = ceil(count($products) / $item_per_page);
        $products_per_page = $productRepository->fetchAll($conds, $sort, $limit);
        require "views/product/products.php";
    }

    function show() {
        $productRepository = new ProductRepository();
        $products = $productRepository->fetchAll();
        $product_id = $_GET["id"];
        $product = $productRepository->find($product_id);

        $sort = null;
        $limit = 5;
        $category_id = $product->getCategoryId();
        $conds = "category_id LIKE '%$category_id%'";
        $relatedProducts = $productRepository->fetchAll($conds, $sort, $limit);
        require "views/product/product.php";
    }

    function comments() {
        $data = [
            'product_id' => $_POST["product_id"],
            'email' => $_POST["email"],
		    'fullname' => $_POST["fullname"],
		    'star-rating' => $_POST["star-rating"],
		    'created_date' => date("Y-m-d H:i:s"),
		    'description' => $_POST["description"],
        ];
        $commentRepository = new CommentRepository();
        $commentRepository->save($data);

        $productRepository = new ProductRepository();
        $product = $productRepository->find($_POST["product_id"]);
        $comments = $product->getComments();
        require "views/layout/comments.php";
    }
}
?>