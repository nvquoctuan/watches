<form action="update_dangky.php" method="POST" name="frm" onsubmit="return dangky()">
    <div class="dangky">
        <h2>Đăng ký</h2>
        <table>
            <tr>
                <td>Tên đăng nhập <font color="red">*</font></td>
                <td class="input"><input type="text" name="user" size="40"/></td>
            </tr>
             <tr>
                <td>Tên người dùng<font color="red">*</font></td>
                <td class="input"><input type="text" name="tennd" size="40"/></td>
            </tr>
            <tr>
                <td>Mật khẩu <font color="red">*</font></td>
                <td class="input"><input type="password" name="pass" size="40"/></td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu <font color="red">*</font></td>
                <td class="input"><input type="password" name="pass2" size="40"/></td>
            </tr>
            <tr>
                <td>Ngày sinh </td>
                <td class="input"><input type="date" name="ngaysinh" size="40"/></td>
            </tr>
            <tr>
                <td>Giới tính </td>
                <td class="input">
                    <select name="gioitinh">
                        <option value="">Chọn giới tính</option>
                        <option value="nam">Nam</option></option>
                        <option value="nu">Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email <font color="red">*</font></td>
                <td class="input"><input type="text" name="email" size="40"/></td>
            </tr>
            <tr>
                <td>Điện thoại <font color="red">*</font></td>
                <td class="input"><input type="text" name="dienthoai" size="40"/></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td class="input"><textarea name="diachi"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="btndangky">
                    <button type="submit" name="submit">Đăng ký</button>
                    <button type="reset">Hủy</button>
                </td>
            </tr>
        </table>
    </div>
</form>

<script lang="javascript">
    function dangky()
    {
        if(frm.user.value=="")
        {
            alert("Bạn chưa nhập tên đăng nhập. Vui lòng kiểm tra lại");     
            frm.user.focus();
            return false;
        }
        if(frm.user.value.length<6)
        {
            alert("Tên đăng nhập quá ngắn. Vui lòng điền đủ họ tên");
            frm.user.focus();
            return false;
        }
        if(frm.tennd.value=="")
        {
            alert("Bạn chưa nhập tên người dùng. Vui lòng kiểm tra lại");
            frm.tennd.focus();
            return false;
        }
        if(frm.tennd.value.length<6)
        {
            alert("Tên người dùng phải hơn 6 ký tự.");
            frm.tennd.focus();
            return false;
        }
        if(frm.pass.value=="")
        {
            alert("Bạn chưa nhập password. Vui lòng nhập password");
            frm.pass.focus();
            return false;
        }
        if(frm.pass.value.length<6)
        {
            alert("Mật khẩu phải hơn 6 ký tự.");
            frm.pass.focus();
            return false;
        }
        if(frm.pass2.value=="")
        {
            alert("Bạn chưa nhập lại password");
            frm.pass2.focus();
            return false;
        }
        mk=frm.pass.value;
        mk1=frm.pass2.value;
        if(mk!=mk1)
        {
            alert("Password chưa đúng");
            frm.pass.focus();
            return false;
        }
        dt=/^[0-9]+$/;
        dienthoai=frm.dienthoai.value;
        if(!dt.test(dienthoai))
        {
            alert("Bạn chưa nhập điện thoại. Vui lòng nhập điện thoại.");
            frm.dienthoai.focus();
            return false;
        }
        dd=frm.dienthoai.value;
        if(dd.length<10 || dd.length >11)
        {
            alert("Số diện thoại không đúng độ dài. Vui lòng nhập lại");
            frm.dienthoai.focus();
            return false;
        }
        
        mail=frm.email.value;
        m=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
        if(mail=="")
        {
            alert("Bạn chưa nhập email");
            mail.focus();
            return false;
        }
        if(!m.test(email))
        {
            alert("Bạn nhập sai email");
            frm.email.focus();
            return false;
        }
       
        
    }


</script>