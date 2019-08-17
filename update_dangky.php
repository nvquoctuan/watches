<?php

include("include/connect.php");

if(isset($_POST['submit']))
{
    $user=$_POST['user'];
    $tennd=$_POST['tennd'];
    $pass=MD5($_POST['pass']);
    $ngaysinh=$_POST['ngaysinh'];
    $gioitinh=$_POST['gioitinh'];
    $email=$_POST['email'];
    $dienthoai=$_POST['dienthoai'];
    $diachi=$_POST['diachi'];
        
    //lấy giỏ của hệ thống
    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    
    //lấy ngày của hệ thống
    $ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
    
    $sql_insert="INSERT INTO nguoidung(tennd,username,password,ngaysinh,gioitinh,email,dienthoai,diachi,ngaydangky,phanquyen)values('$tennd','$user','$pass','$ngaysinh','$gioitinh','$email','$dienthoai','$diachi','$ngay','1')";
    
    $query=mysqli_query($link,$sql_insert);
    if($query)
    {
        //điều hướng 
        echo "<p align='center'> Đăng ký thành công! </p>";
        echo '<meta http-equiv="refresh" content="1;url=index.php">';
    }
    else
    {
        echo "<p align='center'> Đăng ký thất bại! </p>";
        echo '<meta http-equiv="refresh" content="1;url=index.php">';
    }
}


?>