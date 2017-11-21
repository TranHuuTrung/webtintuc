<?php include "includes/header.php" ?>
<?php require_once("includes/conection.php") ?>

<div id="wraper_dangki_dangnhap">
	<form method="POST" action="dangki.php">
		<table style="margin-left : 300px; padding-top: 100px;">
			<tr>
				<td><h3>Form đăng kí</h3></td>
			</tr>	
			<tr>
				<td><p>Username </p></td>
				<td><input  class="input_infomation" type="text" id="username" name="username" size="30"></td>
			</tr>
			<tr>
				<td><p>Password</p> </td>
				<td><input  class="input_infomation" type="password" id="password" name="password" size="30"></td>
			</tr>
			<tr>
				<td><p>Full Name</p></td>
				<td><input  class="input_infomation" type="text" id="name" name="name" size="30"></td>
			</tr>
			<tr>
				<td><p>Email </p></td>
				<td><input  class="input_infomation" type="text" id="email" name="email" size="30"></td>
			</tr>
			<tr>
				<td><a href="./index.php">Trở lại trang chủ</a></td>
				<td align="center" colspan="2"><input class="border_btn" type="submit" name="btn_submit" value="Register"></td>
			</tr>
		</table>
	</form>
	<!-- Kiểm tra nhập vào  -->
	<?php
         //kiểm tra xem người dùng đã bấm nút button submit chưa 
	    if(isset($_POST['btn_submit'])){

           //kiểm tra xem thông tin các trường đã có chưa tránh trường hợp lỗi vì không có 1 trong các trường 
		   $username = isset($_POST['username']) ? $_POST['username'] :"" ;
		   $password = isset($_POST['password']) ? $_POST['password'] :"" ;
		   $email    = isset($_POST['email']) ? $_POST['email'] :"" ;
		   $name     = isset($_POST['name']) ? $_POST['name'] :"" ;


		    if($username == ""){
			   echo "<p style='color: red;' >bạn phải nhập đầy đủ username vào !</p>";
		    }elseif ($password =="") {
			   echo "<p style='color: red;' >Bạn phải nhập Password!</p>";
		    }elseif ($name=="") {
			   echo "<p style='color: red;' >Bạn phải nhập Name!</p>";
		    }elseif ($email=="") {
			   echo "<p style='color: red;' >Bạn phải nhập Email!</p>";
		    }else{
		     //tạo 1 query để đưa dư liệu vào bảng user trong database
			$sql = "INSERT INTO user(username, password, email, fullname, createdate)
			          VALUES('$username', '$password', '$email', '$name', now())";
		    //thực hiện kết nối câu query với database với biến $connect lấy từ file connection.php 
			mysqli_query($connect, $sql);

		   //đăng kí xong thì chuyển sang trang mới
			header('Location: index.php');
		
			
			echo "<p style='color: blue;' >Chúc mừng bạn đã đăng kí thành công!</p>";
		}

	 }
	?>
	      
</div>
<?php include "includes/footer.php" ?>