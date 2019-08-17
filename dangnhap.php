<?php
session_start();
include("include/connect.php");

// kiểm tham số login đã tồn tại hay chưa(nhân nút đăng nhập chưa)
if(isset($_POST['login']))
{
    $username=$_POST['user'];
    $password=MD5($_POST['pass']);
    $sql_check= mysqli_query($link,"select * from nguoidung where username='$username'");
    $dem=mysqli_num_rows($sql_check);
    if($dem==0)
    {
        $_SESSION['thongbaoloi']="Tài khoản không tồn tại";
        echo "
                <script lang='javascript'>
                    alert('Tài khoản không tồn tại');
                    window.open('index.php','_self',1);
                </script>
             " ;       
    }
    else
    {
        //Truy ván đến database = câu lệnh sql
        $sql_check2=mysqli_query($link,"select * from nguoidung where username='$username' and password='$password'");
        
        //lấy một dòng trong $sql_check2 gán cho $dem2
        $dem2=mysqli_num_rows($sql_check2);
        
        //kiểm tra $dem2 có kết quả trả về không
        if($dem2==0)
        {
            echo "
                <script lang='javascript'>
                    alert('Mật khẩu không đúng');
                    window.open('index.php','_self',1);
                </script>
             " ;
        }
        else
        {
            $row=mysqli_fetch_array($sql_check2);
            $_SESSION['username']=$username;
            $_SESSION['phanquyen']=$row['phanquyen'];
            $_SESSION['idnd']=$row['idnd'];
            
            //if phân quyền =0
            if($_SESSION['phanquyen']==0)
            {
                 echo "
                <script lang='javascript'>
                    alert('Đăng nhập thành công');
                    window.open('admin/admin.php','_self',1);
                </script>
             " ;
            }
            
            else
            {
                echo "
                <script lang='javascript'>
                    alert('Đăng nhập thành công');
                    window.open('index.php','_self',1);
                </script>
             " ;
            }// Đóng phân quyền
            
        }// Đóng biến $dem2(check username và password)
    }//Đóng biến $dem(check username có tồn tại hay không)
}


?>