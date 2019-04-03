<?php
session_start();
if ($_SESSION['id'] ==null){
    header('Location:login.php');
}
require_once "../vendor/autoload.php";
use App\Classes\Student;
use App\Classes\Login;
$login= new Login;
if (isset($_GET['logout'])){
    $login->adminLogout();
}
//$message =" ";
//if (!empty($_POST['btn'])){
//    $minhaj = new Student();
//    $message = $minhaj->saveStudentInfo1($_POST);
//}
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>

<?php
//include_once ('../Assets/inc/header.php');
//include_once ('.Assets/lib/Student.php');
//?>
<script type="text/javascript">
    $(document).ready(function () {
        $("form").submit(function(){
            var roll = true;
            $(':radio').each(function(){
               $name = $(this).attr('name');
              if (roll && !$(':radio[name="' +name+ '"]:checked').length){
                 alert(name + "Roll Missing !");
                  $('.alert').show();
                roll = false;
              }
            });
            return roll;
        });
    });
</script>
<?php
//error_reporting(0);
//    $stu = new Student();
//    $cur_date= date('Y-m-d');
//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//    $attend = $_POST['attend'];
//    $insertAttend = $stu->insertAttendance($cur_date,$attend);
//}
//?>
<?php
//    if (isset($insertAttend)){
//        echo $insertAttend;
//    }
//?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">-->
<!--    <title>Student Online Attendence Systems</title>-->
<!--</head>-->
<!--<body>-->
<?php include_once ('../Assets/inc/header.php');?>
<ul class="navbar-nav">
    <li class="nav-item">
        <a href="?logout=true">Logout</a>
    </li>
    <li class="nav-item">
        <a href="nav-link" href="<?php echo $_SESSION['name'];?>">Admin</a>
    </li>
</ul>
</nav>
<div class="btn btn-block btn-info mt-1">
    <h2>Student Online Attentence System With Object Oriented PHP</h2>
</div>
<div class='alert alert-success' style="display: none;"><strong>Error!</strong>Student Roll Missing! </div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn  btn-success" href="add.php">Add Student</a>
            <a class="btn btn-danger" href="date_view.php">View All</a>
        </h2>
    </div>
    <div class="panel-body">
        <div class="well text-center" style="font-size: 18px;">
            <strong>Date: </strong><?php $cur_date= date('d-m-y'); echo $cur_date;?>
        </div>
        <form action="" method="POST">
            <table class="table table-striped">
                <tr>
                    <th width="25%">Serial</th>
                    <th width="25%">Student Name</th>
                    <th width="25%">Student Roll</th>
                    <th width="25%">Attendance</th>
                </tr>
                <?php
                $addstudent = new Student();
                $get_student = $addstudent->saveStudentInfo();
                if ($get_student){
                    $i=0;
                    while ($value=$get_student->fetch_assoc()){
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['roll'];?></td>
                            <td>
                                <input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present">P
                                <input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent">A
                            </td>
                        </tr>
                    <?php }}?>

                <tr>
                    <td colspan="4"><input type="submit" class="btn btn-primary" name="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include_once ('../Assets/inc/footer.php');?>

</body>
</html>


