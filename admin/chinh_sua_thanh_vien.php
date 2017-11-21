<?php 
  session_start();
?>
<?php include_once("includes/conection.php"); ?>
<?php include("includes/permission.php"); ?>
<?php include("includes/header.php"); ?>

<?php 

     if (isset($_POST["btn_chinhsua"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$email = $_POST["email"];
		$permission = $_POST["permission"];
		
		$id = $_POST["id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE user SET username = '$username', email = '$email', permission = '$permission' WHERE id ='$id' ";
		// thực thi câu $sql với biến connect lấy từ file connection.php
		mysqli_query($connect,$sql);
		header('Location: quanlithanhvien.php');
	}

  //get id từ trang quản lí thành viên 
     $id = -1;
     if (isset($_GET['id'])) {
     	$id = $_GET['id'];
     }
     //thực hiện câu sql để select ra tất cả thuộc tính của bảng user theo đk
     $sql = "SELECT * FROM user WHERE id = $id";
     //thực hiện query đến database
     $query = mysqli_query($connect, $sql);

     function make_permission($id)
      {
      	$select_1 = "";
		$select_2 = "";
		if ($id == 0) {
			$select_1 = 'selected="selected"';
		}
		if ($id == 1) {
			$select_2 = 'selected="selected"';
		}
		$select = '<select id="permission" name="permission">
						<option value="0" "$select_1">Thành viên </option>
						<option value="1" "$select_2">Admin</option>
					</select>';
 
		return $select;
      }
?>
 <div id="wrapper_suathanhvien">
	      <!-- phần main -->
	        <div id="main_content">
              <?php 
                  while ($data = mysqli_fetch_array($query)) {
                  	$i = 1;
                  	$id = $data['id'];
              ?>
	        	<form method="POST" action="chinh_sua_thanh_vien.php">
	        		 <table align="center" >
	        		 	<tr>
	        		 		<td colspan="3">
	        		 			<h3>Chỉnh sửa thông tin thành viên</h3>
	        		 			<input class="input_tieude_infomation"  type="hidden" name="id" value="<?php echo $id ?>">
	        		 		</td>
	        		 	</tr>
	        		 	<tr>
	        		 		<td><p>Họ tên </p></td>
	        		 		<td><input class="input_tieude_infomation" type="text" name="username" id="username" value="<?php echo $data['username'] ?>"></td>
	        		 	</tr>
	        		 	<tr>
	        		 		<td><p>Email </p></td>
			                <td><input class="input_tieude_infomation"  type="text" id="email" name="email" value="<?php echo $data['email'] ?>"></td>
	        		 	</tr>
	        		 	<tr>
	        		 		<td><p>Quyền </p></td>
	        		 		<td >
	        		 			<?php echo make_permission($data['permission']); ?>
	        		 		</td>
	        		 	</tr>
	        		 	<tr>
	        		 		<td><a href="./main_of_admin.php">Trở lại trang chủ</a></td>
	        		 		<td colspan="3" align="center"><input class="border_btn" type="submit" name="btn_chinhsua" value="Cập nhật thông tin"></td>
	        		 	</tr>
	        		 </table>
	        	</form>
             <?php } ?>
	        </div>

<?php include("includes/nav_right_in_admin.php") ?>
<?php include("includes/footer.php"); ?>