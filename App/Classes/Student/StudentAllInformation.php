<?php
/**
 * Created by PhpStorm.
 * User: DIU
 * Date: 3/26/2019
 * Time: 10:42 AM
 */

namespace App\Classes\Student;


use App\Classes\Connection;

class StudentAllInformation
{
    /*Student Insert are Here........................*/
    public function InsertStudentInfo(){
        $sql = "SELECT *FROM tbl_students where name = '$_POST[name]',roll='$_POST[roll]',attendance ='$_POST[attendance]'";
        $result = mysqli_query(Connection::dbConnect(),$sql);
        $use = mysqli_fetch_assoc($result);
    if ($use){
            $message =  "Successfully Inserted Student Information";
        }else{
            $message="Doesn't Inserted Student Information";
        }
    return $message;
    }
}