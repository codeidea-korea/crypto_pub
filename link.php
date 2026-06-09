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
				<li>
					<button class="pop-modal add" onclick="modalOpen('roulette_noticket-modal')">룰렛 모달 : 티켓없을때</button>
					<button class="pop-modal add" onclick="modalOpen('roulette_10-modal')">룰렛 모달 : 10분할</button>
					<button class="pop-modal add" onclick="modalOpen('roulette_9-modal')">룰렛 모달 : 9분할</button>
					<button class="pop-modal add" onclick="modalOpen('roulette_8-modal')">룰렛 모달 : 8분할</button>
					<button class="pop-modal add" onclick="modalOpen('roulette_7-modal')">룰렛 모달 : 7분할</button>
					<button class="pop-modal add" onclick="modalOpen('roulette_6-modal')">룰렛 모달 : 6분할</button>
				</li>
				<li>
					<button class="pop-modal add" onclick="modalOpen('inquiry-modal')">1:1 문의 모달 : 답변가능</button>
					<button class="pop-modal add" onclick="modalOpen('inquiry2-modal')">1:1 문의 모달 : 답변대기중</button>
				</li>
				<li>
					<button class="pop-modal add" onclick="modalOpen('wallet-modal'); tabClickHandle('wallet-modal','0')">지갑 모달 - 입금</button>
					<button class="pop-modal add" onclick="modalOpen('wallet-modal'); tabClickHandle('wallet-modal','1')">지갑 모달 - 출금</button>
					<button class="pop-modal add" onclick="modalOpen('wallet-modal'); tabClickHandle('wallet-modal','2')">지갑 모달 - 포인트</button>
					<button class="pop-modal add" onclick="modalOpen('wallet-modal'); modalOpen('krw_wallet-modal');">지갑 모달 - krw 계좌등록</button>
					<button class="pop-modal add" onclick="modalOpen('wallet-modal'); modalOpen('usdt_wallet-modal');">지갑 모달 - usdt 계좌등록</button>
				</li>
				<li>
					<button class="pop-modal add" onclick="modalOpen('wallet2-modal');">지갑 모달 - krw,usdt 승인대기중</button>
					<button class="pop-modal add" onclick="modalOpen('wallet3-modal');">지갑 모달 - krw 보유, usdt 승인대기중</button>
					<button class="pop-modal add" onclick="modalOpen('wallet4-modal');">지갑 모달 - krw 승인대기중, usdt 보유</button>
					<button class="pop-modal add" onclick="modalOpen('wallet5-modal');">지갑 모달 - krw, usdt 보유</button>
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
				<li>
					<a href="./casino_live.html" target="_blank" class="">라이브 카지노</a>
					<ul>
						<li><a href="./casino_detail.html" target="_blank" class="">게임상세</a></li>
					</ul>
				</li>
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
					<a href="./user_message.html?tab=2" target="_blank" class="">쪽지 - 읽음</a>
				</li>
				<li><a href="./user_friendmng.html" target="_blank" class="">지인관리</a></li>
				<li>
					<a href="./user_bettinghistory.html" target="_blank" class="">베팅내역</a>
					<a href="./user_bettinghistory.html?krw" target="_blank" class="">베팅내역 - KRW</a>
					<a href="./user_bettinghistory.html?usdt" target="_blank" class="">베팅내역 - USDT</a>
					<a href="./user_bettinghistory_nodata.html" target="_blank" class="">베팅내역 - 데이터 없을때</a>
				</li>
				<li>
					<ul>
						<li>
							<a href="./user_transactiondetail.html" target="_blank" class="">거래내역 - 입금내역 : 전체</a>
							<a href="./user_transactiondetail.html?tab=1&type=krw" target="_blank" class="">거래내역 - 입금내역 : krw</a>
							<a href="./user_transactiondetail.html?tab=1&type=usdt" target="_blank" class="">거래내역 - 입금내역 : usdt</a>
						</li>
						<li>
							<a href="./user_transactiondetail.html?tab=2" target="_blank" class="">거래내역 - 출금내역 : 전체</a>
							<a href="./user_transactiondetail.html?tab=2&type=krw" target="_blank" class="">거래내역 - 출금내역 : krw</a>
							<a href="./user_transactiondetail.html?tab=2&type=usdt" target="_blank" class="">거래내역 - 출금내역 : usdt</a>
						</li>
						<li>
							<a href="./user_transactiondetail.html?tab=3" target="_blank" class="">거래내역 - 포인트 사용내역</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="./user_cryptobenefit.html" target="_blank" class="">crypto 혜택</a>
				</li>
				<li>
					<a href="./user_moneylog.html" target="_blank" class="">머니로그 : 롤링</a>
				</li>
				<li>
					<a href="./setting.html" target="_blank" class="add">설정 - 회원정보 : krw,usdt 등록 안했을때</a>
					<a href="./setting.html?tab=1" target="_blank" class="add">설정 - 회원정보 : krw,udst 승인대기중</a>
					<a href="./setting.html?tab=1" target="_blank" class="add">설정 - 회원정보 : krw,udst 등록완료</a>
				</li>
			</ul>
		</li>
		<li data-label="이벤트">
			<ul>
				<li><a href="./event.html" target="_blank" class="">이벤트</a></li>
				<li><button class="pop-modal" onclick="modalOpen('event_detail-modal')">이벤트 상세 모달</button></li>
			</ul>
		</li>
		<li data-label="지인추천">
			<ul>
				<li>
					<a href="./user_affiliate.html" target="_blank" class="">제휴 프로그램 - 개요</a>
					<a href="./user_affiliate.html?tab=1" target="_blank" class="">제휴 프로그램 - 추천한 사용자</a>
				</li>
			</ul>
		</li>
		<li data-label="우리에 대해">
			<ul>
				<li>
					<a href="./aboutus.html" target="_blank" class="">우리에 대해 - 회원정보</a>
					<a href="./aboutus.html?tab=1" target="_blank" class="">우리에 대해 - 자금 세탁 방지</a>
					<a href="./aboutus.html?tab=2" target="_blank" class="">우리에 대해 - 개인정보 보호 정책</a>
					<a href="./aboutus.html?tab=3" target="_blank" class="">우리에 대해 - 암호화폐 코인 가이드</a>
				</li>
				<li>
					<a href="./aboutus.html?tab=4" target="_blank" class="">우리에 대해 - 제공자 가용성 정책</a>
					<a href="./aboutus.html?tab=5" target="_blank" class="">우리에 대해 - 스포츠 규정 및 정책</a>
					<a href="./aboutus.html?tab=6" target="_blank" class="">우리에 대해 - 자체 정지 정책</a>
				</li>
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
<script src="./dist/js/jquery-3.7.1.js"></script>
<!-- <script src="./dist/js/custom.js"></script> -->

<script>

	// 탭클릭
	const tabClickHandle = (item,index)=>{
		$(`#${item} .tab_box > a`).eq(index).click();
	}

	// input width 변경
    window.autoWidthInput = (input) => {
        const sizer = input.parentNode.querySelector('.inputSizer');
        const style = getComputedStyle(input);

        sizer.style.font = style.font;
        sizer.style.letterSpacing = style.letterSpacing;
        sizer.textContent = input.value || input.placeholder || '0';

        input.style.width = `${sizer.offsetWidth + 24}px`;
    };

    window.addEventListener('load', () => {
        document.querySelectorAll('.dynamic_input input').forEach(input => {
            autoWidthInput(input);
        });
    });
		
	//=======================================================
	//   공통 - 모달
	//=======================================================
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

	// 비밀번호 password<-->text
	const passwordView = (btn)=>{
		const input = btn.parentElement.querySelector('input');
		const use = btn.querySelector('use');
		if (input.type === 'password') {
			input.type = 'text';
			use.setAttribute('xlink:href','./dist/images/icon-defs.svg#watch');
		} else {
			input.type = 'password';
			use.setAttribute('xlink:href','./dist/images/icon-defs.svg#watch-off');
		}
	}


	//=======================================================
	//   custom select
	//=======================================================
	const customSelectToggle = (item)=>{
		$(item).parent().toggleClass('on')
	}
	const customSelectItem = (item)=>{
		const parent = $(item).parents('.custom_select'); 
		const text = $(item).find('span').html();
		
		parent.removeClass('on');
		$(item).addClass('on').siblings().removeClass('on');

		if(parent.hasClass('txt_type')){
			parent.find(' > button span').html(text);
			return;
		}

		let icon = $(item).find('span svg').html()
		let price = $(item).find('span').text();
		parent.find('> button .price_icon').html(icon)
		parent.find('> button .price_txt').text(price)
	}

	document.addEventListener('click',(e)=>{
		const select = document.querySelector('.custom_select.on')

		if(select && !select.contains(e.target)){
			select.classList.remove('on')
		}
	})

	//=======================================================
	//   tab 변경
	//=======================================================
	const tabChange = (item)=>{
		let liN = $(item).index();
		let content = $(item).parents('.flex').siblings('.tab_content');

		$(item).addClass('active').siblings().removeClass('active');
		content.find('>div').eq(liN).addClass('active').siblings().removeClass('active');
}
	const tabChange2 = (item)=>{
		let liN = $(item).index();
		let content = $(item).parents('.flex').siblings().find('.tab_content');

		$(item).addClass('active').siblings().removeClass('active');
		content.find('>div').eq(liN).addClass('active').siblings().removeClass('active');
	}

	//=======================================================
	//   table
	//=======================================================
	const openDetail = (item)=>{
		$(item).addClass('open').siblings().removeClass('open');
		$(item).next().addClass('detail_open').siblings().removeClass('detail_open');
	}

	//=======================================================
	//   클립보드 복사
	//=======================================================
	const copyToClipboard = (text)=>{
		navigator.clipboard.writeText(text)
			.then(() => {
				alert('복사 완료')
			})
			.catch((err) => {
				console.error('복사 실패', err);
			});
	}

	//=======================================================
	//   입금주소확인
	//=======================================================
	const addressToggle = (item)=>{
		$(item).parent().siblings().find('.deposit_address_box').toggle();
	}

	//=======================================================
	//   btn toggle
	//=======================================================
	const btnToggle = (item)=>{
		$(item).addClass('active').siblings().removeClass('active')
	}


	//=======================================================
	//   wallet coin change
	//=======================================================
	const coinTabChange = (item,coin)=>{
		$(item).addClass('bg-current h-12 -mt-2.5 -mb-1').siblings().removeClass('bg-current h-12 -mt-2.5 -mb-1')
		if(coin == 'krw'){
			$(item).find('svg').removeClass('text-spurple').addClass('text-krw');
			$(item).find('.price').removeClass('text-spurple').addClass('text-krw');
			$(item).siblings().find('svg').addClass('text-spurple').removeClass('text-usdt');
			$(item).siblings().find('.price').addClass('text-spurple').removeClass('text-usdt');
			const price = $(item).find('.price').text();
			$(item).parent().parent().siblings().find('.priceMoney').each(function(){
				$(this).text(price);
				$(this).removeClass('text-usdt').addClass('text-krw');
				$(this).siblings('svg').removeClass('text-usdt').addClass('text-krw');
				$(this).siblings('svg').find('use').attr('href','./dist/images/icon-defs.svg#krw')
			})
		}else{
			$(item).find('svg').removeClass('text-spurple').addClass('text-usdt');
			$(item).find('.price').removeClass('text-spurple').addClass('text-usdt');
			$(item).siblings().find('svg').addClass('text-spurple').removeClass('text-krw');
			$(item).siblings().find('.price').addClass('text-spurple').removeClass('text-krw');
			const price = $(item).find('.price').text();
			$(item).parent().parent().siblings().find('.priceMoney').each(function(){
				$(this).text(price);
				$(this).removeClass('text-krw').addClass('text-usdt');
				$(this).siblings('svg').removeClass('text-krw').addClass('text-usdt');
				$(this).siblings('svg').find('use').attr('href','./dist/images/icon-defs.svg#usdt')
			})
		}
	}



</script>


</body>

</html>