<?php
session_start();
?>
<?php include("includes/conection.php"); ?>
<?php include("includes/permission.php") ?>
<?php include("includes/header.php") ?>

<div id="wrapper_themthanhvien">
	<!-- phần main -->
	<div id="main_content">
		<form action="themthanhvien.php" method="POST">
			<table>
				<caption><h3>Thêm thành viên mới</h3></caption>
				<tr>
					<td><p>Username </p></td>
					<td><input class="input_tieude_infomation" type="text" name="username" id="username" size="30"></td>
				</tr>
				<tr>
					<td><p>Password </p></td>
					<td><input class="input_tieude_infomation" type="text" name="password" id="password" size="30"></td>
				</tr>
				<tr>
					<td><p>Full name </p></td>
					<td><input class="input_tieude_infomation" type="text" name="name" id="name" size="30"></td>
				</tr>
				<tr>
					<td><p>Email </p></td>
					<td><input class="input_tieude_infomation" type="text" name="email" id="email" size="30"></td>
				</tr>
				<tr>
					<td><p>Quyền </p></td>
					<td>
						<select id="permission" name="permission">
							<option value="0">Thành Viên</option>
							<option value="1">Admin</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><a href="./main_of_admin.php">Trở lại trang chủ</a></td>
					<td colspan="3" align="center"><input class="border_btn" type="submit" name="btn_themthanhvienmoi" value="Thêm thành viên mới"></td>
				</tr>
			</table>
		</form>


<!-- xử lí thông tin thêm thành viên mới -->
<?php  
     // kiểm tra xem người quản trị đã bấm nút thêm thành viên chưa
if (isset($_POST['btn_themthanhvienmoi'])) {
     	# nếu đã bấm nút thêm thì chúng ta tiến hành lấy thông tin
	$username   = isset($_POST['username']) ? $_POST['username'] : "";
	$password   = isset($_POST['password']) ? $_POST['password'] : "";
	$name       = isset($_POST['name']) ? $_POST['name'] : "";
	$email      = isset($_POST['email']) ? $_POST['email'] :"";
	$permission = isset($_POST['permission']) ? $_POST['permission'] : "0";

     	// kiểm tra xem có bỏ trống trường nào ko
	if ($username == "") {
		echo "<p style='color: red;' >Username không được bỏ trống!</p>";
	}elseif ($password =="") {
		echo "<p style='color: red;' >Password không được để trống!</p>";
	}elseif ($name=="") {
		echo "<p style='color: red;' >Fullname không được để trống!</p>";
	}elseif ($email=="") {
		echo "<p style='color: red;' >Email không được để trống!</p>";
	}else{
        //viết câu lệnh sql thêm vào bảng user
		$sql = "INSERT INTO user(username, password, email, fullname, createdate, permission)
		        VALUES('$username', '$password','$email','$name', now(), '$permission')";
       //thực hiện câu query dến database
		$init_user = mysqli_query($connect, $sql);

		// kiểm tra xem có trùng dữ liệu trong database hay không 
		if (!$init_user) {
			echo "<p style='color: red;' >Người dùng đã tồn tại, vui lòng không nhập trùng username và email!</p>";
		}else{
			header('Location: http://localhost/webtintuc/admin/quanlithanhvien.php');
		}
	}
}


?>

	</div>
<?php include("includes/nav_right_in_admin.php"); ?>
<?php include("includes/footer.php"); ?>