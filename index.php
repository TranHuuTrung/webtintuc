<?php include "includes/conection.php" ?>
<?php include "includes/header.php" ?>

<?php 
       //lấy bài viết từ database 
$sql = "SELECT * FROM posts ORDER BY createdate DESC LIMIT 16";
$query = mysqli_query($connect, $sql);
?>

<!-- Phần wrapper bao gồm main và nav -->
<div id="wrapper">
	<!-- phần main -->
	<div id="main_content">

		<table width="100%" border="0">
			<tr>
				<?php 
				//khởi tạo biến đếm để khi nào đếm bằng 4 mình sẽ cho xuống dong
				$i = 0;
				//lặp để lấy dữ liệu
				while ($data = mysqli_fetch_array($query)) {
				       //nếu i =4 chúng ta sẽ cho nó xuống dòng và gán lại i=0 để thực hiện lấy dữ liệu tiếp
					if($i == 1){
						echo "</tr>";
						$i = 0;
					}
					?>
					<td>
						<b style="color: blue; font-size: 18px;"><?php echo $data["title"]; ?></b>
						<p><?php echo substr($data["content"], 0, 130)."...."; ?></p>
						<a href="display.php?id=<?php echo $data['id']; ?>">Đọc tiếp</a>
					</td>
					<?php 
					$i++;
                   }//end vòng lặp while
                   ?>
               </table>
           </div>
           <!-- #end main_contant -->
           <!-- phần navigation bên phải  -->
           <?php include "includes/nav_right.php" ?>
       <?php include "includes/footer.php" ?>
