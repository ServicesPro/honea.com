function checkCart() {
    alert("ok");

    (cart = JSON.parse(localStorage.getItem("cart"))),
        null == cart || 0 == cart.cartProduct.length
            ? ((cart = { cartProduct: [] }), (count.style.display = "none"), (document.querySelector(".empty").style.display = "flex"))
            : ((document.querySelector(".empty").style.display = "none"), (count.style.display = "inline"), (count.textContent = cart.cartProduct.length));
}
function displayPanier() {
    cart.cartProduct.forEach(function (e) {
        createProduct(e);
    });
}
function createProduct(e) {
    let t = document.createElement("div");
    t.className = "product";
    let n = document.createElement("div");
    n.className = "image";
    let i = document.createElement("div");
    i.className = "icon";
    let c = document.createElement("img");
    (c.src = "../icon/delete_trash.svg"), (c.height = "20"), (c.width = "20"), i.appendChild(c);
    let o = document.createElement("div");
    o.className = "myPrix";
    let a = document.createElement("div");
    a.className = "quantity";
    let l = document.createElement("img"),
        r = document.createElement("span"),
        u = document.createElement("img");
    (l.src = "../icon/minus.svg"), (l.height = "20"), (l.width = "20"), (u.src = "../icon/add.svg"), (u.height = "20"), (u.width = "20"), (r.textContent = e.quantite), a.appendChild(l), a.appendChild(r), a.appendChild(u);
    let s = document.createElement("h3"),
        d = (document.createElement("img"), document.createElement("span"));
    d.textContent = "RETIRER";
    let m = e.quantite * e.prix;
    (s.textContent = m.toLocaleString() + " FCFA"), o.appendChild(s);
    let p = document.createElement("h1"),
        h = document.createElement("h2");
    (p.textContent = e.nom), (h.textContent = "Detail: inconnu");
    let y = document.createElement("div");
    (y.className = "name"), y.appendChild(p), y.appendChild(h), y.appendChild(a), y.appendChild(o);
    let f = document.createElement("img");
    (f.src = e.thumb),
        (f.height = "60"),
        (f.width = "60"),
        n.appendChild(f),
        n.appendChild(y),
        t.appendChild(n),
        t.appendChild(i),
        root.appendChild(t),
        i.addEventListener("click", function () {
            cart.cartProduct.splice(cart.cartProduct.indexOf(e), 1), localStorage.setItem("cart", JSON.stringify(cart)), (root.innerHTML = ""), displayPanier(), checkCart();
        }),
        u.addEventListener("click", function () {
            e.quantite++, (r.textContent = e.quantite);
            let t = e.quantite * e.prix;
            (s.textContent = t.toLocaleString() + " FCFA"), localStorage.setItem("cart", JSON.stringify(cart));
        }),
        l.addEventListener("click", function () {
            if (e.quantite > 1) {
                e.quantite--, (r.textContent = e.quantite);
                let t = e.quantite * e.prix;
                (s.textContent = t.toLocaleString() + " FCFA"), localStorage.setItem("cart", JSON.stringify(cart));
            }
        });
}
function setOnClick() {
    send.addEventListener("click", function () {
        if (null == cart || 0 == cart.cartProduct.length) alert("Le panier est vide...");
        else {
            firebase.auth();
            firebase.auth().onAuthStateChanged(function (e) {
                null == e ? (console.log(e), localStorage.setItem("username", ""), localStorage.setItem("userphone", ""), (window.location.href = "/connection.html")) : (window.location.href = "/achat.html");
            });
        }
    });
}
var firebaseConfig = {
    apiKey: "AIzaSyCAjf5FkLQCFAuI1ai9l1xYrr_BUCCL0n4",
    authDomain: "bestdistribution-169c9.firebaseapp.com",
    databaseURL: "https://bestdistribution-169c9.firebaseio.com",
    projectId: "bestdistribution-169c9",
    storageBucket: "bestdistribution-169c9.appspot.com",
    messagingSenderId: "908399684323",
    appId: "1:908399684323:web:ccf5182870d4fcce62f3d6",
};
firebase.initializeApp(firebaseConfig);
let root = document.querySelector(".productWrapper");
const count = document.querySelector(".count"),
    buttonHome = document.querySelector(".navHome"),
    send = document.querySelector("#send");
let subSelect,
    subSelectOld,
    timeOutInit,
    hoverCount = 0;
var cart;
let product;
checkCart(),
    displayPanier(),
    setOnClick(),
    $(document).ready(function () {
        $(".s-itm").on({
            mouseenter: function (e) {
                hoverCount++, $(this).css("color", "#b32020"), $(this).css("font-weight", "700");
                let t,
                    n = $(this).find("span"),
                    i = n.attr("id");
                (t = "categorie10" == i || "categorie11" == i ? i.substr(i.length - 2) : i.substr(i.length - 1)),
                    null != subSelect && (subSelect.style.display = "none"),
                    null != timeOutInit && window.clearTimeout(timeOutInit),
                    (subSelect = document.querySelector("#sub" + t)),
                    (subSelect.style.display = "block");
            },
            mouseleave: function () {
                $(this).css("color", "inherit"),
                    $(this).css("font-weight", "normal"),
                    (timeOutInit = window.setTimeout(() => {
                        (subSelect.style.display = "none"), (document.querySelector("#sideMenu").style.display = "none");
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
                    timeOutInit = window.setTimeout(() => {
                        (subSelect.style.display = "none"), (document.querySelector("#sideMenu").style.display = "none");
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
            }),
            $("#drawer-icon").on({
                mouseenter: function (e) {
                    window.innerWidth > 768 && ((document.querySelector("#sideMenu").style.display = "block"), null != timeOutInit && window.clearTimeout(timeOutInit));
                },
                mouseleave: function (e) {
                    timeOutInit = window.setTimeout(() => {
                        document.querySelector("#sideMenu").style.display = "none";
                    }, 500);
                },
            });
    });
