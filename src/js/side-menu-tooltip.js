import tippy, { roundArrow } from "tippy.js";

(function () {
    "use strict";

    // Side menu tooltips
    let initTooltips = (function tooltips() {
        $(".side-menu").each(function () {
            if (this._tippy == undefined) {
                let content = $(this)
                    .find(".side-menu__title")
                    .html()
                    .replace(/<[^>]*>?/gm, "")
                    .trim();
                tippy(this, {
                    content: content,
                    arrow: roundArrow,
                    animation: "shift-away",
                    placement: "right",
                });
            }

            if (
                $(window).width() <= 1260 ||
                $(this).closest(".side-nav").hasClass("side-nav--simple")
            ) {
                this._tippy.enable();
            } else {
                this._tippy.disable();
            }
        });

        return tooltips;
    })();

    window.addEventListener("resize", () => {
        if($(".side-menu")){
            initTooltips();
        }
    });


    function toggleSideNav() {
        const sideNav = document.querySelector(".side-nav");
        sideNav.classList.toggle("fold");

        // fold 클래스 변경 체크 함수 호출
        checkFold();
    }

    const foldBtn = document.querySelector(".fold_btn");
    if(foldBtn){
        foldBtn.addEventListener("click", toggleSideNav);
    }

    // fold 클래스 체크 함수
    function checkFold() {
        const sideMenus = document.querySelectorAll('.side-menu');
        const sideNav = document.querySelector('.side-nav');

        if(sideNav == null) return;

        if (sideNav.classList.contains('fold')) {
            sideMenus.forEach(menu => {
                if (menu._tippy != undefined) {
                    menu._tippy.enable();
                }
            });
        } else {
            sideMenus.forEach(menu => {
                if (menu._tippy != undefined) {
                    menu._tippy.disable();
                }
            });
        }
    }

    // 페이지 로드 시 fold 클래스 변경 체크 함수 호출
    checkFold();

})();
