<?php
session_start();
/**
 * Created by PhpStorm.
 * User: LE DINH CHUNG
 * Date: 17/04/2014
 * Time: 15:26
 */
include("../administrator/connect.php");
include("../administrator/function.php");
echo "<meta charset='UTF-8' />";
if(isset($_POST['login']))
{
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $sql_check = mysql_query("select * from users where username = '$username'");
    $dem = mysql_num_rows($sql_check);
    if($dem == 0)
    {
        echo "Tài khoản không tồn tại";
    }
    else
    {
        $sql_check2 = mysql_query("select * from users where username = '$username' and password = '$password'");
        $dem2 = mysql_num_rows($sql_check2);
        if($dem2 == 0)
            redirect("login.php", "Mật khẩu đăng nhập không đúng",0.5);
        else
        {
            while($rows = mysql_fetch_object($sql_check2))
            {
                $phanquyen = $rows -> phanquyen	;
                if($phanquyen = '1')
                {
                    $_SESSION['admin'] = $username;
                    echo "<script language='javascript'>
                        alert('Đăng nhập thành công');
                        window.open('trangchu.php','_self',1);
                    </script>";
                }
                else
                {
                    $_SESSION['user'] = $username;
                    redirect("../index.php", "Đăng nhập thành công!", 0.5);
                }
            }
        }
    }
}