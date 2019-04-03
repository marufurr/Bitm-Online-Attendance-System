<?php

namespace App\classes;
//use App\classes\Config\Connection;
use App\Classes\Connection;

class Login
{
    public function adminLogin($data){
        $email = $data['email'];
        $password = md5($data['password']);
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        if(mysqli_query(Connection::dbConnection(),$sql)){
            $result = mysqli_query(Connection::dbConnection(),$sql);
            $use = mysqli_fetch_assoc($result);
            if($use){
                session_start();
                $_SESSION['id']=$use['id'];
                $_SESSION['name']=$use['name'];

                header('Location:addStudent.php');
            } else {
                $message = "Please use valid email and password";
                return $message;
            }
        } else {
            die('Query Problem'.mysqli_error(Connection::dbConnection()));
        }
    }

    public function adminLogout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location:login.php');
    }
}