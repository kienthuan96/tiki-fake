<?php 
class RegisterController {
    function create() {        
        $customerRepository = new CustomerRepository();
        $data = [
            'name' => $_POST["fullname"] ,
            'mobile' => $_POST["mobile"] ,
            'email' => $_POST["email"] ,
            'password' => password_hash($_POST["password"], PASSWORD_BCRYPT) ,
            'login_by' => "form" ,
            'ward_id' => null,
            'housenumber_street' => "",
            'is_active' => 1,
        ];
        $customerRepository->save($data);
        if($customerRepository->save($data)){
            $_SESSION["success"] = "Tạo tài khoản thành công";
        }
        else { 
            $_SESSION["error"] = $customerRepository->getError();
        };
        header("location:index.php");
    }

    function existingEmail() {
        $email = $_GET["email"];
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($email);
        if(!$customer) {
            echo "true";
            return;
        };
        echo "false";
        return;
    }
}

?>