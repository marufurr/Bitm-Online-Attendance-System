<?php
namespace App\Classes;
class Student
{
    public function saveStudentInfo(){
        $link = mysqli_connect('localhost','root','','db_sams');

        $sql = "INSERT INTO tbl_student(name,roll) VALUES ('$_POST[name]','$_POST[roll]')";
        if(mysqli_query($link,$sql)){
            $message = "Student Info saved successfully";
            return $message;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
    /*start*/
    public function insertStudent($name, $roll){
        $link = mysqli_connect('localhost', 'root', '', 'db_sams');

        $name = $_POST['name'];
        $roll = $_POST['roll'];
        if (empty($name) || empty($roll)) {
            $msg = "<div class='alert alert-danger'><strong><b>Error! Field Must Not Be Empty!</b></strong> </div>";
            return $msg;
        } else {
            $stu_query = "INSERT INTO tbl_student(name,roll) VALUES ('$_POST[name]','$_POST[roll]')";
            if ($stu_query) {
                $msg = "<div class='alert alert-success'><strong>Success! Student Data Inserted Successfully!!!</strong> </div>";
                return $msg;
            }

            if (mysqli_query($link, $stu_query)) {
                $result = mysqli_query($link, $stu_query);
                return $result;
            } /*else {
                die('Query Problem' . mysqli_error($link));
            }*/
       // }


                //$att_query = "INSERT INTO tbl_attendance(roll) VALUES ('$roll')";

           else {
                $msg = "<div class='alert alert-danger'><strong>Success! Student Data Not Inserted!</strong> </div>";
                return $msg;
            }
        }
    }
    /*end*/
    public function viewStudentInfo(){
        $link = mysqli_connect('localhost','root','','db_sams');
        $sql ="select *from tbl_student";
        if(mysqli_query($link,$sql)){
            $result = mysqli_query($link,$sql);
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
    public function getStudentInfoById($id){
        $link = mysqli_connect('localhost','root','','db_sams');
        $sql = "SELECT * FROM tbl_student WHERE id = '$id'";
        if(mysqli_query($link,$sql)){
            $result = mysqli_query($link,$sql);
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }
    public function updateStudentInfo(){
        $link = mysqli_connect('localhost','root','','db_sams');
        $sql = "UPDATE demos SET name='$_POST[name]', email='$_POST[email]',mobile='$_POST[mobile]' WHERE id='$_POST[id]'";
        if(mysqli_query($link,$sql)){
            header('Location:viewStudent.php');
        } else {
            die('Connection Problem'.mysqli_error($link));
        }
    }
    public function deleteStudentInfo($id){
        $link = mysqli_connect('localhost','root','','db_sams');
        $sql = "DELETE FROM demos WHERE id = '$id'";
        if(mysqli_query($link,$sql)){
            header('Location:viewStudent.php');
        } else{
            die('Connection Problem'.mysqli_error($link));
        }
    }
    public function searchStudentInfo(){
        $link = mysqli_connect('localhost','root','','db_sams');
        $sql = "SELECT * FROM demos WHERE name LIKE '%$_POST[search_text]%' || email LIKE '%$_POST[search_text]%' || mobile LIKE '%$_POST[search_text]%'";
        if(mysqli_query($link,$sql)){
            $result = mysqli_query($link,$sql);
            return $result;
        } else {
            die('Query Problem'.mysqli_error($link));
        }
    }

}












