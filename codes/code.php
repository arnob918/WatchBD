<?php

session_start();
include('../database/dbcon.php');

if(isset($_POST['reg_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $con_password = mysqli_real_escape_string($con, $_POST['cpassword']);

    $email_query = "SELECT email FROM users WHERE email='$email' ";
    $email_query_run = mysqli_query($con, $email_query);

    if(mysqli_num_rows($email_query_run) == 0)
    {

        if($password != $con_password)
        {
            $_SESSION['message'] = "Passwords are different";
            header('Location: ../register.php');
        }
        else
        {
            $isadmin = '0';
            if(isset($_POST['isadmin'])){
                $admintoken = mysqli_real_escape_string($con, $_POST['admin-token']);
                if($admintoken == "xyz"){
                    $isadmin = '1';
                }
                else{
                    $_SESSION['message'] = "Admin token is wrong";
                    header('Location: ../register.php');
                    exit();
                }
            }
            $data_query = "INSERT INTO users (name, email, password, is_admin) VALUES ('$name', '$email', '$password', '$isadmin')";
            $run_query = mysqli_query($con, $data_query);

            if($run_query)
            {
                $_SESSION['message'] = "Registration Successfull";
                header('Location: ../login.php');
            }
            else{
                $_SESSION['message'] = "There was a problem";
                header('Location: ../register.php');
            }
        }
    }
    else{
        $_SESSION['message'] = "Email already taken";
        header('Location: ../register.php');
    }
}

else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query_login = "SELECT * FROM users WHERE email='$email' ";
    $run_query = mysqli_query($con, $query_login);
    if(mysqli_num_rows($run_query) == 0)
    {
        $_SESSION['message'] = "Inalide email";
        header('Location: ../login.php');
    }
    else
    {
        $user_data = mysqli_fetch_array($run_query);
        $real_password = $user_data['password'];
        if($password != $real_password){
            $_SESSION['message'] = "Inalide password";
            header('Location: ../login.php');
            exit();
        }
        $_SESSION['is_admin'] = $user_data['is_admin'];
        $_SESSION['logged_in'] = true;
        $_SESSION['user_info'] = [
            'name' => $user_data['name'],
            'email' => $user_data['email']
        ];
        if($user_data['is_admin'] == 1)
        {
            $_SESSION['message'] = "Welcome to Dashboard";
            header('Location: ../admin.php');
        }
        else
        {
            $_SESSION['message'] = "Login Successfull";
            header('Location: ../index.php');
        }
    }
}

else if(isset($_POST['add-product']))
{
    $name = $_POST['name'];
    $product_code = $_POST['product-code'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $band = $_POST['band'];
    $type = $_POST['type'];
    $original_price = $_POST['original-price'];
    $selling_price = $_POST['selling-price'];
    $available = isset($_POST['available']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $gender = $_POST['gender'];

    $image = $_FILES['image']['name'];
    
    $folder = "../images";
    $image_ex = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ex;

    $db_query = "INSERT INTO products (name, product_code, brand, model, description, band, gender, type, original_price, selling_price, image, available, trending) VALUES ('$name', '$product_code', '$brand', '$model', '$description', '$band', '$gender', '$type', '$original_price', '$selling_price', '$filename', '$available', '$trending')";

    $run_db_query = mysqli_query($con, $db_query);

    if($run_db_query){
        move_uploaded_file($_FILES['image']['tmp_name'], $folder.'/'.$filename);
        $_SESSION['message'] = "Product Added Successfully";
        header('Location: ../add-product.php');
    }
    else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: ../add-product.php');
    }
}

else if(isset($_POST['edit-product']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $product_code = $_POST['product-code'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $band = $_POST['band'];
    $type = $_POST['type'];
    $original_price = $_POST['original-price'];
    $selling_price = $_POST['selling-price'];
    $available = isset($_POST['available']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $gender = $_POST['gender'];
    $old_image = $_POST['old-image'];

    $image = $_FILES['image']['name'];

    $new_image = $old_image;

    if($image != ""){
        $new_image = $image;
    }

    $folder = "../images";
    $image_ex = pathinfo($new_image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ex;
    if($image == ""){
        $filename = $old_image;
    }

    $query = "UPDATE products SET name='$name', product_code='$product_code', brand='$brand', model='$model', description='$description', band='$band', gender='$gender', type='$type',original_price='$original_price', selling_price='$selling_price', image='$filename', available='$available', trending='$trending' WHERE id='$id' ";
    $run_query = mysqli_query($con, $query);

    if($run_query){
        if($image != ""){
            if(file_exists("../images/".$old_image)){
                unlink("../images/".$old_image);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $folder.'/'.$filename);
        }
        $_SESSION['message'] = "Product Updated Successfully";
        header('Location: ../products.php');
    }
    else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: ../products.php');
    }
}

else if(isset($_POST['delete-product-btn']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete-id']);
    $query = "SELECT * FROM products WHERE id = '$id'";
    $run_query = mysqli_query($con, $query);
    $data = mysqli_fetch_array($run_query);

    $image = $data['image'];

    $dlt_query = "DELETE FROM products WHERE id = '$id' ";
    $run_dlt_query = mysqli_query($con, $dlt_query);

    if($run_dlt_query){

        if(file_exists("../images/".$image)){

            unlink("../images/".$image);

        }
        $_SESSION['message'] = "Product Deleted Successfully";
        header('Location: ../products.php');
    }
    else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: ../products.php');
    }
}

else if(isset($_POST['confirm-order']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $reference = mysqli_real_escape_string($con, $_POST['reference']);
    $name = mysqli_real_escape_string($con, $_POST['rcvname']);
    $phone = mysqli_real_escape_string($con, $_POST['rcvphone']);
    $address = mysqli_real_escape_string($con, $_POST['rcvaddress']);
    $payment_method = "Bkash";
    if(!isset($_POST['Bkash'])){
        $payment_method = "Cash on Delivery";
        $reference = "";
    }

    $db_query = "INSERT INTO orders (product_id, qty, amount, payment_method, reference, name, phone, address) VALUES ('$id', '$qty', '$amount', '$payment_method', '$reference', '$name', '$phone', '$address')";
    $run_db_query = mysqli_query($con, $db_query);
    if($run_db_query){
        $_SESSION['message'] = "Order Placed Successfully";
        header('Location: ../product-view.php?id='.$id);
    }
    else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: ../product-view.php?id='.$id);
    }
    if(isset($_SESSION['bkash-payment'])){
        unset($_SESSION['bkash-payment']);
    }
}
?>