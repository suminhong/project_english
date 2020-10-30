<?php
	$conn=mysqli_connect('localhost','root','9701hong','awscop');

	$basic=$_POST['basic'];
	$extra=$_POST['extra'];

	if ($basic <=2000000){
		$tax=0.01;
	}
	elseif ($basic<=4000000) {
		$tax=0.02;
	}
	else {
		$tax=0.03;
	}

	$salary=($basic+$extra)*(1-$tax);

	$filtered=array(
		'name' => mysqli_real_escape_string($conn, $_POST['name']),
		'rank' => mysqli_real_escape_string($conn, $_POST['rank']),
	);

	$sql="
		INSERT INTO 월급관리 (이름, 직급, 기본급, 수당, 세율, 월급)
		VALUES (
			'{$filtered['name']}',
			'{$filtered['rank']}',
			$basic,
			$extra,
			$tax,
			$salary
		)"
	;

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
			$result=mysqli_query($conn, $sql);
			if($result === false) {
				echo '글 등록 오류가 발생하였습니다. 관리자에게 문의하세요.';
        		echo error_log(mysqli_error($conn));
			} else {
        		echo '정상적으로 등록되었습니다.<br> <a href="index.php">메인 페이지로 돌아가기</a>';
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
			© 2020. Hong Su Min all rights reserved.
		</p>
	</div><!--footer-->
	</div>
	</div><!--page-->
</body>
</html>