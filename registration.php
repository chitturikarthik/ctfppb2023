<html>
<head>
<link rel="stylesheet" href="alert/dist/sweetalert.css">
</head>
</html>


<?php
$server_name = "localhost";
$username = "ctfppb";
$password = "ctfpp#8201";
$database_name = "ctfppb";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
    die("Connection Failed:" - mysqli_connect_error());
}

function autoincemp1()
{
    global $value2;
    global $conn;
    $query = "select id from registrations order by id desc LIMIT 1";
    $stmt = mysqli_query($conn,$query);
    $rowcount=$stmt->num_rows;
    if ($rowcount==0)
    {
        return 1;
    }
    else{
    $row = mysqli_fetch_assoc($stmt);
        $value2 = $row['id'];
        $value2 = $value2 + 1;
        // $str="V";
        // $value2 = "".sprintf('%s',$value2);
        $value = $value2;
        return $value;
    }
}

function autoincemp()
{
    global $value2;
    global $conn;
    $query = "select id from registrations order by id desc LIMIT 1";
    $stmt = mysqli_query($conn,$query);
    $rowcount=$stmt->num_rows;
    if ($rowcount >= 0) {
    
    $row = mysqli_fetch_assoc($stmt);
        $value2 = $row['id'];
        $value2 = substr($value2,2);
        $value2 = (int)$value2 + 1;
        $str="V";
        $value2 = "".sprintf('%s',$value2);
        $value = $value2;
        return $value;
    } else {
        $value2 = "V1000";
        $value = $value2;
        return $value;
    }
}

if(isset($_POST['register']))
{

    $id=autoincemp1();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $role = $_POST['role'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $transaction = $_POST['transaction'];
    $desig = $_POST['desig'];
    $dept = $_POST['dept'];
    $institution = $_POST['institution'];
    $dpayment = $_POST['dpayment'];
    $ptype = $_POST['ptype'];
    $gender = $_POST['gender'];
    
    $receipt = $_FILES['receipt']['name'];
    $tmp_ = $_FILES['receipt']['tmp_name'];
    $abstract = $_FILES['abstract']['name'];
    $tmp= $_FILES['abstract']['tmp_name'];

    $fname = explode('.', $_FILES['receipt']['name']);
    $v=$id.'.'.$fname[1] ;

    $aname = explode('.', $_FILES['abstract']['name']);
    $w=$id.'.'.$aname[1] ;

    move_uploaded_file($tmp_,"uploads/payments/$v");
    move_uploaded_file($tmp,"uploads/abstracts/$w");
    
    $sql_query = "INSERT INTO registrations(id,name,email,mobile,role,country,state,city,transaction,desig,dept,institution,dpayment,ptype,gender,receipt,abstract) VALUES ('$id','$name','$email','$mobile','$role','$country','$state','$city','$transaction','$desig','$dept','$institution','$dpayment','$ptype','$gender','$v','$w')";

    if (mysqli_query($conn, $sql_query))
    {
        echo'<script>
        window.location = "alert.html";
        </script>';
        
    }
    else 
    {
        echo "Error:" . $sql_query . "" . mysqli_error($conn);
    }
    mysqli_close($conn); 

}
?>