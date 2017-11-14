<?php 
session_start();
?>
<?php require_once("includes/conection.php"); ?>
<?php include("includes/permission.php"); ?>
<?php include("includes/header.php"); ?>
<?php
     //kiểm tra xem người dùng đã bấm nút đăng bài chưa
if (isset($_POST["btn_dangbai"])) {
	
	$title = $_POST["title"];
	$content =$_POST["content"];

    // lấy user_id từ khi người dùng đăng nhập\ chưa kết nối được với permission
	$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";
	// $user_id = $_SESSION["user_id"];

	if ($user_id == "") {
		echo "Bạn cần đăng nhập để đăng bài viết";
		echo "<a href='http://localhost/webtintuc/dangnhap.php'> Đăng nhập ngay</a>";
	}elseif($title =="") {
		echo "Bạn phải tạo tiêu đề cho bài viết";
	}elseif ($content =="") {
		echo "Bạn phải tạo nội dung cho bài viết";
	}else{
    	 //thực hiện câu sql để thêm bài viết vào bảng database pots
		$sql = "INSERT INTO posts(title, content, user_id, createdate, updatedate)
		VALUES('$title', '$content', '$user_id', now(), now()) ";
	    //thực thi câu lệnh sql
		mysqli_query($connect, $sql);
		echo "Bạn đã thêm bài viết thành công!";
	}


}
?>
<form method="POST" action="thembaiviet.php">
	<table>
		<tr>
			<td colspan="3"><h3>Thêm bài viết mới </h3></td>
		</tr>
		<tr>
			<td>Tiêu đề : </td>
			<td><input type="text" id="title" name="title"></td>
		</tr>
		<tr>
			<td>Nội dung : </td>
			<td><textarea name="content" id="content" cols="100" rows="10"></textarea></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" name="btn_dangbai" value="Thêm bài viết"></td>
		</tr>
	</table>

</form>
<?php include("includes/footer.php") ?>