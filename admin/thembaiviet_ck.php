<?php 
session_start();
?>
<?php require_once("includes/conection.php"); ?>
<?php include("includes/permission.php"); ?>
<?php include("includes/header.php"); ?>

<div id="wrapper_them_bai_viet">
	<!-- phần main -->
	<div id="main_content">
		<!-- <?php var_dump($_SESSION)?> -->
		<form method="POST" action="thembaiviet_ck.php">
			<table style="margin-left : 50px;">
				<tr>
					<td colspan="3"><h3>Thêm bài viết mới </h3></td>
				</tr>
				<tr>
					<td><p>Tiêu đề : </p></td>
					<td><input type="text" id="title" name="title" class="input_tieude_infomation" size="80"></td>
				</tr>
				<tr>
					<td><p>Nội dung : </p></td>
					<td><textarea name="post_content" id="post_content" cols="100" rows="10"></textarea></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input class="border_btn" type="submit" name="btn_dangbai" value="Thêm bài viết"></td>
				</tr>
			</table>

		</form>
		<script>
	           //thay thế textarea làm cho khung thêm nội dung đẹp hơn
	           CKEDITOR.replace( 'post_content' );
        </script>
        <?php
     //kiểm tra xem người dùng đã bấm nút đăng bài chưa
if (isset($_POST["btn_dangbai"])) {

	$title = $_POST["title"];
	$content =$_POST["post_content"];

	// echo($_GET["user_id"]);

    //lấy user_id từ khi người dùng đăng nhập\ chưa kết nối được với permission
	// $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";
	$user_id = $_SESSION["user_id"];


	// $permission = isset($_SESSION["permission"]) ? $_SESSION["permission"] :"ko có";

	// if ($user_id == "") {
	// 	echo "Bạn cần đăng nhập để đăng bài viết";
	// 	echo "<a href='http://localhost/webtintuc/dangnhap.php'> Đăng nhập ngay</a>";
	// }elseif
	if($title =="") {
		echo "<p style='color:red;'>Bạn phải tạo tiêu đề cho bài viết</p>";
	}elseif ($content =="") {
		echo "<p style='color:red;'>Bạn phải tạo nội dung cho bài viết</p>";
	}else{

		$permission = $_SESSION["permission"];

		//thực hiện câu sql để thêm bài viết vào bảng database pots
		$sql = "INSERT INTO posts(title, content, user_id, createdate, updatedate)
		VALUES('$title', '$content', '$user_id', now(), now()) ";
	    //thực thi câu lệnh sql
		mysqli_query($connect, $sql);
		echo "<p style='color:green;'>Bạn đã thêm bài viết thành công!</p>";
  //  	   if ($permission == '1') {
		// $sql = "INSERT INTO posts(title, content, user_id, createdate, updatedate)
		// VALUES('$title', '$content', '$user_id', now(), now()) ";
	 //    //thực thi câu lệnh sql
		// mysqli_query($connect, $sql);
		// echo "<p style='color:green;'>Bạn đã thêm bài viết thành công!</p>";
		//  echo $permission;
		// }
		// else {
		// 	echo "<p style='color:green;'>Bạn đã thêm bài viết ko thành công!</p>";
		// }

	}


}
?>
    </div>
<?php include("includes/nav_right_in_admin.php") ?>
<?php include("includes/footer.php") ?>