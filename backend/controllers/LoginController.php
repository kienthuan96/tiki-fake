<?php 
class LoginController {
    function form() {
        var_dump($_POST);
        $email = $_POST["email"];
        $password = $_POST["password"];
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($email);
        if ($customer) {
            $password_hash = $customer->getPassword();
            if(password_verify($password, $password_hash)) {
                $_SESSION["success"] = "Đăng nhập thành công";
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $customer->getName();
                header("location:index.php");
                exit;
            }
        } 
        $_SESSION["error"] = "Vui lòng nhập lại tài khoản và mật khẩu";
        header("location:index.php");
    }
    function google() {
        
    }
    function facebook() {
            
    }

    function logout() {
        session_destroy();
        header("location:index.php");
    }
}

?>