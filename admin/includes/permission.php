<!-- quyên truy cập vào thêm sửa xóa bài viết dữ liệu trong database -->
<?php  
if (!isset($_SESSION["user_id"])) {
	//nếu chưa đăng nhập
	header('Loaction :  ./dangnhap.php');
}else{
   if (isset($_SESSION["permission"])) {
   	   $permission = $_SESSION["permission"];

   	   //kiểm tra có phải là admin hay không nếu trả về lớn hơn 0 là admin
   	   if ($permission == '0') {
   	   	    //nếu ko là admin
   	   	    echo "Bạn không đủ quyền truy cập vào trang này!";
   	   	    echo "<a href='./main_of_admin.php'> Click để về lại trang chủ</a>";
   	   	    exit();
   	   }
   }

}

?>