<?php 
session_start();
?>
<?php include("includes/conection.php") ?>
<?php include("includes/permission.php") ?>
<?php include("includes/header.php") ?>

<?php  
    //tạo câu sql truy vấn dữ liệu
    $sql = "SELECT * FROM user";
    $query = mysqli_query($connect, $sql);
?>

<!-- xóa thành viên -->
<?php 
   if (isset($_GET['id_delete'])) {
   	//thực hiện 1 câu lệnh sql để xóa
   	$id_xoa = $_GET['id_delete'];
     $sql = "DELETE FROM user WHERE id ='$id_xoa' ";
     //thực hiện query
     mysqli_query($connect, $sql);
   }

?>
<!-- end xóa thành viên -->

<div id="wrapper_qlithanhvien">
	<!-- phần main -->
	<div id="main_content">
		<a href="themthanhvien.php">Thêm thành viên mới</a>
		<table  border="1px" align="center">
			<caption><p>Quản Lí Thành Viên</p></caption>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Quyền</th>
				<th>Chỉnh sửa</th>
			</tr>
			<?php
               //vòng lặp để lấy ra thông tin các thành viên
			    $i = 1 ;
			   while ($data = mysqli_fetch_array($query)) {
			   	    $id = $data['id'];
			?>
			<tr>
				<td><?php echo $i; ?> </td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo ($data['permission'] == 0)? " Thành Viên ":" Admin "  ; ?></td>
				<td>
					<a href="chinh_sua_thanh_vien.php?id=<?php echo $id; ?>">Sửa</a>
					<a href="quanlithanhvien.php?id_delete=<?php echo $id; ?>">Xóa</a>
				</td>
			</tr>

			<?php 
                  $i ++;
		        } 
			?>
		
		</table>
    </div>
<?php include("includes/nav_right_in_admin.php"); ?>
<?php include("includes/footer.php"); ?>