<?php
	$conn=mysqli_connect('localhost','root','9701hong','awscop');	

	settype($_GET['id'], 'integer');
	$a=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AWSCOP</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
	<div id="header">
		<div id="logo">
			<a href="index.php"><img src="images/logo.png" alt="LOGO"></a>
		</div>
		<ul id="navigation">
			<li><a href="create.php">신규등록</a></li>
			<li><a href="print.php">조회/수정</a></li>
		</ul>
	</div><!--header-->
	<div id="contents">
		<?php
			$sql="SELECT * FROM 월급관리 WHERE id=$a";
			$result=mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$filtered = array(
	            '이름' => htmlspecialchars($row['이름']),
	            '직급' => htmlspecialchars($row['직급']),
	            '기본급' => htmlspecialchars($row['기본급']),
	            '수당' => htmlspecialchars($row['수당'])
        	);
		?>
  		<form action="update_process.php?id=<?php echo $_GET['id'] ?>" method="post">
			<p><input type="text" name="name" placeholder="이름" value="<?= $filtered['이름'] ?>"></p>
			<p><input type="text" name="rank" placeholder="직급" value="<?= $filtered['직급'] ?>"></p>
			<p><input type="text" name="basic" placeholder="기본급" value="<?= $filtered['기본급'] ?>"></p>
			<p><input type="text" name="extra" placeholder="수당" value="<?= $filtered['수당'] ?>"></p>
			<p><input type="submit" value="수정"></p>
		</form>
	</div><!--contents-->
	<div id="footer">
		<div>
		<ul id="links">
			<li>
				<h4>홈페이지 이상 시</h4>
				<ul>
					<li>TEL : 0212345678</li>
					<li>E-MAIL : aws123@gmail.com</li>
				</ul>
			</li>
			<li>
				<h4>Social Links</h4>
				<ul id="connect">
					<li>
						<a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter">Twitter</a>
					</li>
					<li>
						<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook">Facebook</a>
					</li>
					<li>
						<a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus">Google +</a>
					</li>
				</ul><!--connect-->
			</li>
		</ul><!--links-->
		<p class="footnote">
			© Copyright 2023.Company name all rights reserved
		</p>
	</div><!--footer-->
	</div>
	</div><!--page-->
</body>
</html>