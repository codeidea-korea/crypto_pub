<?php include_once('lib/common.lib.php'); ?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<title>CRYPTO link</title>
	<meta http-equiv="imagetoolbar" content="no">
	<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link href="https://design01.codeidea.io/link_style.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="./dist/css/app.css" /> -->
	<!-- <link rel="stylesheet" href="./dist/css/jquery.datetimepicker.min.css" /> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="./css/reset.css" />
	<link rel="stylesheet" href="./css/style.css" />
	<style>
		.ex_table th{
			border-bottom-width:1px;	
			border-right-width:1px;
		}
		.ex_table th:last-child{
			border-right-width:0px;
		}
	</style>
</head>

<body class="nofetch">
<?php include_once('./_svg_reset.php'); ?>

<div class="publishing-help">
	<span class="label not">작업중</span>
	<span class="label popup">팝업</span>
	<span class="label change">수정</span>
	<span class="label add">최근 추가</span>
	<!-- <a href="./css/iconfont/intaefont/" target="_blank" class="icon">아이콘 모음</a> -->
</div>

<?php
function txtRecord($dir)
{
	if (is_dir($dir)) {
		$handle  = opendir($dir);
		$files = array();
		while (false !== ($filename = readdir($handle))) {
			if ($filename == "." || $filename == "..") continue;
			if (is_file($dir . "/" . $filename)) {
				$files[] = $filename;
			}
		}
		closedir($handle);
		rsort($files);
		if (count($files) > 0) {
			echo '<div class="_record rsort">';
			echo '<ul>';
			foreach ($files as $f) {
				$name = '수정 ' . preg_replace("/[^0-9]*/s", "", $f);
				echo '<li><a href="' . $dir . $f . '" target="_black">' . $name . '</a></li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}
}
echo txtRecord('./@record/');
?>

<div id="publishingContainer">

	<ul class="page-link" style="width:100%;margin-bottom:-50px">
		<li data-label="메인">
			<ul>
				<li><a href="./index_logout.html" target="_blank" class="">로그아웃시 메인</a></li>
				<li><a href="./index_nocoin.html" target="_blank" class="">krw,usdt 등록 안했을때 메인</a></li>
				<li><a href="./index.html" target="_blank" class="">로그인 후 메인</a></li>
			</ul>
		</li>
		<!-- <li><a href="./onboarding/onboarding.html" target="_blank" class="">온보딩 작성 완료페이지</a></li>
        <li>
			<a href="./index.php" target="_blank" class="">메인</a>
			<ul>
				<li><a href="./terms.php" target="_blank" class="">서비스 이용약관</a></li>
				<li><a href="./privacy.php" target="_blank" class="">개인정보 처리방침</a></li>
			</ul>
		</li>
		<li><a href="./service.php" target="_blank" class="">서비스</a></li>
		<li><a href="./portfolio.php" target="_blank" class="">포트폴리오</a></li>
		<li>
			<a href="./join.php" target="_blank" class="">회원가입</a>
			<ul>
				<li>
					<button class="pop-modal" onclick="modalOpen('join_complete-modal')">회원가입 완료 모달</button>
					<button class="pop-modal" onclick="modalOpen('privacy-modal')">개인정보처리방침 전문보기 모달</button>
					<button class="pop-modal" onclick="modalOpen('marketing-modal')">마케팅활용동의 전문보기 모달</button>
				</li>
			</ul>
		</li>
		<li><a href="./login.php" target="_blank" class="">로그인</a></li> -->
	</ul>

    
</div>


<!-- 모달 들어가는곳 : S -->    
<div class="modal" id="join_complete-modal">
	<div class="modal_wrap">
		<div class="alert_body">
			<img src="./img/logo_black.svg" alt="">
			<div class="txt">
				{이름}님 회원가입을 환영합니다!<br/>
				지금 바로 크래빗 무료체험을 시작하세요
			</div>
			<div class="btn_box">
				<a href="./index.php" class="btn btn-secondary">메인으로</a>
				<a onclick="modalClose('join_complete-modal')" class="btn btn-primary">워크스페이스 바로가기</a>
			</div>
		</div>
	</div>
</div>
<?php include_once('_modal.php'); ?>
<!-- 모달 들어가는곳 : E -->

<script>
	const modalOpen = (item) => {
		$('body').addClass('overflow-hidden')
		$(`#${item}`).addClass('show');
	}
	const modalClose = (item) => {
		$('body').removeClass('overflow-hidden')
		$(`#${item}`).removeClass('show')
	}
</script>

<script src='https://design01.codeidea.io/link_script.js'></script>
<!-- <script src="./dist/js/app.js"></script> -->
<!-- <script src="./dist/js/jquery.datetimepicker.full.js"></script> -->
<script src="./js/jquery-3.7.1.js"></script>
<!-- <script src="./js/common.js"></script> -->



</body>

</html>