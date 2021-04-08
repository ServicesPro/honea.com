function isUserLogin() {
    let e = localStorage.getItem("username");
    null != e && "" != e
        ? ((document.getElementById("historique").href = "/historique.html"), (document.querySelector("#commande").href = "/commande.html"))
        : ((document.querySelector("#commande").href = "/connection.html"), (document.querySelector("#historique").href = "/connection.html"));
}
function setSellImage() {
    if (window.innerWidth < 1184)
        try {
            var e = document.querySelector("#sell-small-wrap"),
                t = document.querySelector("#flyer9 img");
            (e.style.display = "block"), t.setAttribute("data-src", "/image/oneImage.jpg");
        } catch (e) {}
}
function setOnClick() {
    for (
        window.innerWidth <= 768 &&
            ($(".categorieItem2").css("cursor", "pointer"),
            $(".categorieItem2").click(function () {
                console.log("oui");
                let e = jQuery(this).find("p").text();
                var t = "/categorie.html?categorie=" + e;
                window.location.href = t;
            })),
            $(".all").click(function () {
                let e = $(this).attr("data-categorie");
                var t = "/categorie.html?categorie=" + e;
                window.location.href = t;
            }),
            $(".hove h4").click(function () {
                let e = $(this).text();
                var t = "/categorie.html?categorie=" + e;
                window.location.href = t;
            }),
            $(".hove h5").click(function () {
                let e = $(this).text();
                var t = "/categorie.html?categorie=" + e;
                window.location.href = t;
            }),
            document.querySelector("body").addEventListener("click", function () {
                (drawerMenu.style.transform = "translateX(-100%)"), (document.querySelector("body").style.position = "initial");
            }),
            i = 1;
        i <= 12;
        i++
    ) {
        const e = document.querySelector(".sCat" + i);
        e.parentNode.addEventListener("click", function () {
            let t = e.textContent;
            var o = "/categorie.html?categorie=" + t;
            window.location.href = o;
        });
    }
    document.querySelector("#btn-search").addEventListener("click", function () {
        let e = editText.value;
        null == e || "" == e || (window.location.href = "/recent.html?rechercher=" + e);
    }),
        document.querySelector("#btn-searchM").addEventListener("click", function () {
            let e = editTextM.value;
            null == e || "" == e || (window.location.href = "/recent.html?rechercher=" + e);
        }),
        paysButton.addEventListener("click", function (e) {
            e.stopPropagation();
            let t = window.getComputedStyle(paysDrop);
            "none" == t.display
                ? ((paysDrop.style.display = "block"), (paysButton.style.backgroundColor = "#ededed"), (paysButton.style.borderRadius = "4px"))
                : ((paysDrop.style.display = "none"), (paysButton.style.backgroundColor = "#fff"));
        }),
        editText.addEventListener("keyup", function (e) {
            if ("Enter" === e.key) {
                let e = editText.value;
                null == e || "" == e || ((window.location.href = "/recent.html?rechercher=" + e), console.log("font"));
            }
        }),
        souCate.forEach(function (e) {
            e.addEventListener("click", function () {
                let t = e.textContent;
                var o = "/categorie.html?categorie=" + t;
                window.location.href = o;
            });
        }),
        souCateTitle.forEach(function (e) {
            e.addEventListener("click", function () {
                let t = e.textContent;
                var o = "/categorie.html?categorie=" + t;
                window.location.href = o;
            });
        }),
        $(window).click(function () {
            (paysDrop.style.display = "none"), (paysButton.style.backgroundColor = "#fff");
        }),
        $(document).ready(function () {
            $(".s-itm").on({
                mouseenter: function (e) {
                    hoverCount++, $(this).css("color", "#b32020"), $(this).css("font-weight", "700");
                    let t,
                        o = $(this).find("span"),
                        n = o.attr("id");
                    (t = "categorie10" == n || "categorie11" == n ? n.substr(n.length - 2) : n.substr(n.length - 1)),
                        null != subSelect && (subSelect.style.display = "none"),
                        null != timeOutInit && window.clearTimeout(timeOutInit),
                        (subSelect = document.querySelector("#sub" + t)),
                        (subSelect.style.display = "block");
                },
                mouseleave: function () {
                    $(this).css("color", "inherit"),
                        $(this).css("font-weight", "normal"),
                        (timeOutInit = window.setTimeout(function () {
                            subSelect.style.display = "none";
                        }, 500));
                },
            }),
                $(".cat-title").on({
                    mouseenter: function (e) {
                        window.clearTimeout(timeOutInit);
                    },
                    mouseleave: function (e) {},
                }),
                $(".cat-itm").on({
                    mouseenter: function (e) {
                        window.clearTimeout(timeOutInit);
                    },
                    mouseleave: function (e) {},
                }),
                $(".sub").on({
                    mouseenter: function (e) {
                        window.clearTimeout(timeOutInit);
                    },
                    mouseleave: function (e) {
                        timeOutInit = window.setTimeout(function () {
                            subSelect.style.display = "none";
                        }, 500);
                    },
                }),
                $(".categorieItem2").on({
                    mouseenter: function (e) {
                        jQuery(this).find("div").css("display", "block");
                    },
                    mouseleave: function () {
                        jQuery(this).find("div").css("display", "none");
                    },
                });
        });
}
function checkCart() {
    (cart = JSON.parse(localStorage.getItem("cart"))),
        null == cart || 0 == cart.cartProduct.length ? ((cart = { cartProduct: [] }), (count.style.display = "none")) : ((count.style.display = "inline"), (count.textContent = cart.cartProduct.length));
}
function setSliderProperty() {
    function e() {
        (document.querySelector(".controls .selected").className = ""), (o.children[n].className += " selected"), window.innerWidth, (t.style.transform = "translate(" + -20 * n + "%)");
    }
    document.querySelector("#wrapper_slide");
    const t = document.querySelector("#slider"),
        o = (document.querySelector(".left"), document.querySelector(".right"), document.querySelector(".controls ul"));
    var n = 0;
    $("#wrapper_slide").on({
        mouseenter: function (e) {
            window.innerWidth > 768 && (document.querySelector(".controls-arrow").style.display = "flex");
        },
        mouseleave: function () {
            document.querySelector(".controls-arrow").style.display = "none";
        },
    }),
        n < 4 &&
            setInterval(function () {
                (n = n < 4 ? n + 1 : 0), 0 == n ? ((n = 0), e(), (document.querySelector(".controls .selected").className = ""), (document.querySelectorAll(".controls li")[0].className = "selected")) : e();
            }, 5e3),
        slideNext.addEventListener("click", function () {
            n >= 0 && n < 4 && ((n += 1), (o.children[n].className += " selected"), e());
        }),
        slidePrev.addEventListener("click", function () {
            n <= 4 && n > 0 && ((n -= 1), e());
        }),
        slideControl.forEach(function (t, o) {
            t.addEventListener("click", function () {
                (n = o), e(), (t.className = "selected");
            });
        });
}
function startMobileSearch() {
    let e = document.querySelector("#editTextM").value;
    null == e || "" == e || ((window.location.href = "/recent.html?rechercher=" + e.normalize("NFD").replace(/[\u0300-\u036f]/g, "")), console.log("font"));
}
function checkDevice() {
    /iPhone|iPad|iPod|Android/.test(window.navigator.userAgent);
}
const mainHeader = document.querySelector("#mainHeader"),
    paysDrop = document.querySelector(".paysDrop"),
    count = document.querySelector(".count"),
    editText = document.querySelector("#search-input"),
    editTextM = document.querySelector("#editTextM"),
    coSousCategorie = document.querySelector(".co"),
    slideNext = document.querySelector("#slide-next"),
    slidePrev = document.querySelector("#slide-prev");
var slideControlPre = document.querySelectorAll(".controls li"),
    souCatePre = document.querySelectorAll(".cat-itm");
let souCateTitlePre = document.querySelectorAll(".cat-title");
var souCate = Array.prototype.slice.call(souCatePre);
let subSelect,
    subSelectOld,
    timeOutInit,
    souCateTitle = Array.prototype.slice.call(souCateTitlePre),
    slideControl = Array.prototype.slice.call(slideControlPre),
    hoverCount = 0;
setSellImage(),
    setOnClick(),
    checkCart(),
    setSliderProperty(),
    setSocialMediaOnClick(),
    isUserLogin(),
    $(function () {
        $(".lazy").Lazy();
    });
