<?php
    $conn=mysqli_connect('localhost','pj-user','1234','awscop');

    settype($_POST['id'], 'integer');
    $filtered = array(
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );

    $sql = "
        DELETE FROM employee_salary WHERE id = '{$filtered['id']}'
        ";

    $result = mysqli_multi_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AWSCOP</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
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
			if($result === false) {
        		echo '삭제하는 과정에서 오류가 발생하였습니다. 관리자에게 문의하세요.';
        		echo error_log(mysqli_error($conn));
    		} else {
        		header('Location: print.php');
    		}
		?>
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
						<a href="https://twitter.com/" target="_blank" class="twitter">Twitter</a>
					</li>
					<li>
						<a href="https://www.facebook.com/" target="_blank" class="facebook">Facebook</a>
					</li>
				</ul><!--connect-->
			</li>
		</ul><!--links-->
		<p class="footnote">
			© 2020. Hong Su Min all rights reserved.
		</p>
	</div><!--footer-->
	</div>
	</div><!--page-->
</body>
</html>