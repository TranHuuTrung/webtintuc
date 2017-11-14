<?php 
      require_once("includes/conection.php");
 ?>
 <?php include "includes/header.php"; ?>

 <!-- lấy id truyền từ index.php sang -->
 <?php  
       $id = -1;
       if(isset($_GET["id"])){
       	    $id = intval($_GET["id"]); //dùng intval để chuyển các dạng như chuỗi số ... -> số hệ số 10 kiểu int
       }

       //thực hiện câu sql để lấy ra các thông tin bài viết theo id 
       $sql = "SELECT * FROM posts WHERE id = $id";
       //thực hiện truy vấn dữ liệu thông qua $connect
       $query = mysqli_query($connect, $sql);

 ?> <!-- end câu lệnh php lấy id-->
        <div id="wrapper">
	      <!-- phần main -->
	        <div id="main_content">
                <?php 

                    //mảng dữ liệu 
                    while ($data = mysqli_fetch_array($query)) {
                      //câu sql lấy tên user theo user_id
                      //phải tạo 1 biến $i vì vòng lặp while thay đổi chỉ số của mảng data 
                      //nếu chỗ user.id = $posts.user_id thì nõ luôn chỉ bởi 1 người viết
                      $i = $data['user_id'] ;
                      $sql1 = "SELECT * FROM user inner join posts on user.id = '$i' ";
                      $query1 = mysqli_query($connect,$sql1);
                      $data1 = mysqli_fetch_array($query1);
                      //trường hợp username bị xóa 
                      $data_name = isset($data1['fullname']) ? $data1['fullname'] : "Admin";
                      // $day  = "SELECT DAYNAME($data['createdate'])";
                ?>
                <!-- hiển thị nội dung của bài viết  -->
                 <h2 style="color: blue;"><?php echo $data["title"]; ?></h2></br>
                 <i>Ngày tạo: <?php echo $data['createdate']." <b>by</b> ".$data_name; ?></i><br><br>
                 <p><?php echo $data["content"]; ?></p>

                <?php } ?>

           </div>
        	

        <?php include "includes/nav_right.php" ?>
 <?php include "includes/footer.php" ?>
 
