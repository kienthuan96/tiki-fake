<?php 
    class ProductColorRepository {
        
        function fetchAll($condition) {
            global $conn;
            $colors = array();
            $sql = "SELECT * FROM product_color";
            if($condition) {
                $sql .= " WHERE $condition";
            }
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $color = new ProductColor($row["id"], $row["product_id"], $row["color"], $row["image"]);
                    $colors[] = $color;
                }
            }
            return $colors;
        }

        function getByProductId($product_id) {
            return $this->fetchAll("product_id = $product_id");
        }
    }
?>