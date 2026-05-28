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

	<script>
        (function(d) {
            var config = {
            kitId: 'tjz1wdv',
            scriptTimeout: 3000,
            async: true
            },
            h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>

	<link href="https://design01.codeidea.io/link_style.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="./dist/css/app.css" /> -->
	<!-- <link rel="stylesheet" href="./dist/css/jquery.datetimepicker.min.css" /> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="./dist/css/app.css" />
	<link rel="stylesheet" href="./dist/css/custom.css" />
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
		<li data-label="모달">
			<ul>
				<li>
					<button class="pop-modal" onclick="modalOpen('login-modal')">로그인 모달</button>
					<button class="pop-modal" onclick="modalOpen('join-modal')">회원가입 모달</button>
					<button class="pop-modal" onclick="modalOpen('join_complete-modal')">회원가입 완료 모달</button>
					<button class="pop-modal" onclick="modalOpen('usdt_regist-modal')">usdt 테더지갑 등록 모달</button>
					<button class="pop-modal" onclick="modalOpen('krw_regist-modal')">krw 계좌 등록 모달</button>
				</li>
				<li>
					<button class="pop-modal" onclick="modalOpen('wallet_state-modal')">추가 정보 입력 완료 -로그인전 모달</button>
					<button class="pop-modal" onclick="modalOpen('wallet_state2-modal')">추가 정보 입력 완료 - 로그인후 모달</button>
					<button class="pop-modal" onclick="modalOpen('payment_enter-modal')">결제 정보 입력 모달</button>
					<button class="pop-modal" onclick="modalOpen('usdt_regist_complete-modal')">테더 지갑 등록 완료 모달</button>
					<button class="pop-modal" onclick="modalOpen('krw_regist_complete-modal')">krw 계좌 등록 완료 모달</button>
				</li>
				<li>
					<button class="pop-modal" onclick="modalOpen('alert_1-modal')">가입한아이디로 로그인 모달</button>
					<button class="pop-modal" onclick="modalOpen('alert_2-modal')">테더지갑 승인대기 모달</button>
					<button class="pop-modal" onclick="modalOpen('alert_3-modal')">계좌 승인대기 모달</button>
					<button class="pop-modal" onclick="modalOpen('logout-modal')">로그아웃 모달</button>
					<button class="pop-modal" onclick="modalOpen('delete-modal')">삭제 모달</button>
				</li>
			</ul>
		</li>
		<li data-label="메인">
			<ul>
				<li><a href="./index_logout.html" target="_blank" class="">로그아웃시 메인</a></li>
				<li><a href="./index_nocoin.html" target="_blank" class="">krw,usdt 등록 안했을때 메인</a></li>
				<li><a href="./index.html" target="_blank" class="">로그인 후 메인</a></li>
			</ul>
		</li>
		<li data-label="카지노">
			<ul>
				<li><a href="./casino_live.html" target="_blank" class="">라이브 카지노</a></li>
				<li><a href="./casino_slot.html" target="_blank" class="">슬롯</a></li>
				<li><a href="./casino_bet.html" target="_blank" class="">벳게임즈</a></li>
				<li><a href="./casino_table.html" target="_blank" class="">테이블게임</a></li>
			</ul>
		</li>
		<li data-label="미니게임">
			<ul>
				<li><a href="./casino_mini.html" target="_blank" class="">미니게임</a></li>
			</ul>
		</li>
		<li data-label="내계정">
			<ul>
				<li>
					<a href="./user_message.html" target="_blank" class="">쪽지 - 전체</a>
					<a href="./user_message.html?tab=1" target="_blank" class="">쪽지 - 안읽음</a>
					<a href="./user_message.html?tab=1" target="_blank" class="">쪽지 - 읽음</a>
				</li>
				<li><a href="./user_friendmng.html" target="_blank" class="">지인관리</a></li>
			</ul>
		</li>
		<li data-label="이벤트">
			<ul>
				<li><a href="./event.html" target="_blank" class="">이벤트</a></li>
				<li><button class="pop-modal" onclick="modalOpen('event_detail-modal')">이벤트 상세 모달</button></li>
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

<?php include_once('_modal.html'); ?>
<!-- 모달 들어가는곳 : E -->


<script src='https://design01.codeidea.io/link_script.js'></script>
<!-- <script src="./dist/js/app.js"></script> -->
<!-- <script src="./dist/js/jquery.datetimepicker.full.js"></script> -->
<script src="./dist/js/app.js"></script>

<script>
	const modalOpen = (item) => {
		const modal = document.querySelector(`#${item}`);
		modal.classList.add("show", "overflow-y-auto");
		modal.style.marginTop = "0px";
		modal.style.marginLeft = "0px";
		modal.style.paddingLeft = "0px";
		modal.style.zIndex = "10000";
	};

	// 모달 닫기
	const modalClose = (item)=>{
		const modal = document.querySelector(`#${item}`);
		modal.classList.remove('show');
		modal.style.marginTop = "-10000px";
		modal.style.marginLeft = "-10000px";
		modal.style.paddingLeft = "0";
		modal.style.zIndex = "0";
	}

</script>


</body>

</html>