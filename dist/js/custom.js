//=======================================================
//   html load
//=======================================================

window.addEventListener("load", ()=>{
    // 로딩이미지 가리기
    const loader = document.querySelector('.main-loader')
    if(loader){
        setTimeout(function(){
            loader.classList.add('hide')
        },1000)
    }
    
    // 헤더 - 로그인 후
    fetch("./_header.html")
        .then((response) => response.text())
        .then((htmlData) => {
            if(!$('body').hasClass('logout')){
                $('.content').prepend(htmlData)
                headerScript();
            }
        })
        .catch((error) => {
            console.log(error);
        });

    // 헤더 - 로그인 전
    fetch("./_header_logout.html")
        .then((response) => response.text())
        .then((htmlData) => {
            if($('body').hasClass('logout')){
                $('.content').prepend(htmlData)
                headerScript();
            }
        })
        .catch((error) => {
            console.log(error);
        });
    
    // 사이드메뉴
    fetch("./_side_menu.html")
        .then((response) => response.text())
        .then((htmlData) => {
            $('#wrap').prepend(htmlData)
            sideMenu();
        })
        .catch((error) => {
            console.log(error);
        });

    // 푸터 
    fetch("./_footer.html")
        .then((response) => response.text())
        .then((htmlData) => {
            $('body').append(htmlData);
            footerScript()
        })
        .catch((error) => {
            console.log(error);
        });

    // 모달 
    fetch("./_modal.html")
        .then((response) => response.text())
        .then((htmlData) => {
            $('#wrap').append(htmlData);
            setTimeout(()=>{
                loadJquery();
            },1000)
        })
        .catch((error) => {
            console.log(error);
        });

});

const headerScript = ()=>{
    $(window).on('scroll',function(){
        let scT = $(this).scrollTop();
        if(scT > 0){
            $('header').addClass('fix')
        }else{
            $('header').removeClass('fix')
        }
    })
}

const sideMenu = ()=>{
    $(".side-menu").on("click", function () {
        if ($(this).parent().find("ul").length) {
            if ($(this).parent().find("ul").first()[0].offsetParent !== null) {
                $(this)
                    .find(".side-menu__sub-icon")
                    .removeClass("transform rotate-180");
                $(this).removeClass("side-menu--open");
                $(this)
                    .parent()
                    .find("ul")
                    .first()
                    .slideUp(300, function () {
                        $(this).removeClass("side-menu__sub-open");
                    });
            } else {
                $(this)
                    .find(".side-menu__sub-icon")
                    .addClass("transform rotate-180");
                $(this).addClass("side-menu--open");
                $(this)
                    .parent()
                    .find("ul")
                    .first()
                    .slideDown(300, function () {
                        $(this).addClass("side-menu__sub-open");
                    });
            }
        }
    });
    
    $('.side_menu .fold_btn').on('click',function(){
        $('.side_menu').toggleClass('fold');
        $(this).toggleClass('fold');
        $('.content').toggleClass('fold')
    })



}
const footerScript = ()=>{}
const loadJquery = ()=>{}

// 메뉴오픈
const menuOn = (depth1,depth2)=>{
    setTimeout(function(){
        $(`.side-nav .${depth1} > .side-menu`).addClass('side-menu--active');
        if(depth2){
            $(`.side-nav .${depth1} > .side-menu`).find('.side-menu__sub-icon').addClass('transform rotate-180');
            $(`.side-nav .${depth1} > ul`).addClass('side-menu__sub-open');
            $(`.side-nav .${depth1} > ul`).find('> li').eq((depth2-1)).find('.side-menu').addClass('side-menu--active');
        };
    },500);
}

// 모바일 퀙 > 사이드메뉴 토글
const sideToggle = ()=>{
    $('.side_menu').toggleClass('open')
}


// 검색창 열기
const searchOpen = ()=>{
    $('.search_area').addClass('active');
}

// 검색시 결과 보이기
const searchTyping = (item) => {
    if ($(item).val().trim() !== '') {
        $('.search_result').addClass('typing');
    } else {
        $('.search_result').removeClass('typing');
    }
}

// 딤 영역 클릭시 닫기
$(document).on('click', function(e) {
    if ( $('.search_area').hasClass('active') && !$(e.target).closest('.search_box, .search_result').length) {
        $('.search_area').removeClass('active');
    }
});

// 코인 변경
const coinChange = (item,coin)=>{
    $(item).addClass('active').siblings().removeClass('active');
    $('.coin_box').removeClass('krw usdt').addClass(coin)
}

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

$('.custom_select > button').on('click',function(){
    $(this).parent().toggleClass('on')
})
$('.custom_select ul li').on('click',function(){
    const parent = $(this).parents('.custom_select'); 
    const text = $(this).find('span').html();

    if(parent.hasClass('txt_type')){
        parent.removeClass('on')
        parent.find(' > button span').html(text)
        $(this).addClass('on').siblings().removeClass('on')
    }else{
        parent.removeClass('on')
        $(this).addClass('on').siblings().removeClass('on')

        let icon = $(this).find('span svg').html()
        let price = $(this).find('span').text();
        parent.find('> button .price_icon').html(icon)
        parent.find('> button .price_txt').text(price)
        
    }

});
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
    $(item).addClass('active').siblings().removeClass('active');
    $('.tab_content > div').eq(liN).addClass('active').siblings().removeClass('active');
}

//=======================================================
//   table
//=======================================================
const openDetail = (item)=>{
    $(item).addClass('open').siblings().removeClass('open');
    $(item).next().addClass('detail_open').siblings().removeClass('detail_open');
}