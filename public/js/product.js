function checkCategorie() {
    let e = window.location.href,
        t = e.split("=")[1];
    null == t || "" == t
        ? "Offres du jour" == sectionTitle.textContent
            ? ((categorie = sectionTitle.textContent), (productContainer.innerHTML = ""), getProductDay())
            : "Produits" != sectionTitle.textContent || "" == t
            ? ((categorie = sectionTitle.textContent), (productContainer.innerHTML = ""), getProductCategorie())
            : getProduct()
        : getProductCategorie();
}
function setOnClick() {
    $(".all").click(function () {
        let e = $(this).attr("data-categorie");
        var t = "/categorie.html?categorie=" + e;
        window.location.href = t;
    }),
        $("#prixFilter a").click(function () {
            (OldPrixSelect = document.querySelector("#prixFilter .radioItem.select")),
                null != OldPrixSelect && ((OldPrixSelect.style.backgroundColor = "#fff"), (OldPrixSelect.style.border = "2px solid #c7c7cd"), (OldPrixSelect.className = "radioItem")),
                $(this).find(".radioItem").addClass("select"),
                $(this).find(".radioItem").css("background-color", "#b32020"),
                $(this).find(".radioItem").css("border", "2px solid #b32020"),
                $(this).find(".radioItem").css("padding", "2px"),
                $("prixSelect").css("color", "#b32020"),
                (sortSelect = $(this).find(".tPrix").text()),
                (buttonLoading.style.display = "flex"),
                (pageIndex = 1),
                (pageNumber.textContent = pageIndex),
                (lastVisible = void 0),
                getProduct();
        }),
        $("#voteFilter a").click(function () {
            (OldVoteSelect = document.querySelector("#voteFilter .radioItem.select")),
                null != OldVoteSelect && ((OldVoteSelect.style.backgroundColor = "#fff"), (OldVoteSelect.style.border = "2px solid #c7c7cd"), (OldVoteSelect.className = "radioItem")),
                $(this).find(".radioItem").addClass("select"),
                $(this).find(".radioItem").css("background-color", "#b32020"),
                $(this).find(".radioItem").css("border", "2px solid #b32020"),
                $(this).find(".radioItem").css("padding", "2px"),
                $("prixSelect").css("color", "#b32020");
            $(this).find(".tPrix").text();
        }),
        $(".sideCat").click(function () {
            let e = $(this).find("span"),
                t = e.text();
            var o = encodeURIComponent(t.trim()),
                r = "/categorie.html?categorie=" + o;
            window.location.href = r;
        }),
        $(".navCategorieContainer a").click(function () {
            let e = $(this).find("p"),
                t = e.text();
            var o = encodeURIComponent(t.trim()),
                r = "/categorie.html?categorie=" + o;
            window.location.href = r;
        }),
        document.querySelector(".next").addEventListener("click", function (e) {
            if (null != lastVisible) {
                buttonLoading.style.display = "flex";
                try {
                    $([document.documentElement, document.body]).animate({ scrollTop: $("#all").offset().top - 90 }, 500);
                } catch (e) {
                    $(document).ready(function () {
                        $(window).scrollTop(0);
                    });
                }
                pageIndex++, (pageNumber.textContent = pageIndex), (document.querySelector(".productFooter").style.display = "none"), getProduct();
            }
        }),
        document.querySelector(".prev").addEventListener("click", function (e) {
            if (null != lastVisible && pageIndex > 1) {
                buttonLoading.style.display = "flex";
                try {
                    $([document.documentElement, document.body]).animate({ scrollTop: $("#all").offset().top - 90 }, 500);
                } catch (e) {
                    $(document).ready(function () {
                        $(window).scrollTop(0);
                    });
                }
                pageIndex--, (pageNumber.textContent = pageIndex), (previous = !0), (document.querySelector(".productFooter").style.display = "none"), getProduct();
            }
        }),
        document.querySelector("body").addEventListener("click", function () {
            (drawerMenu.style.transform = "translateX(-100%)"), (document.querySelector("body").style.position = "initial");
            try {
                document.querySelector(".search-drag").style.display = "none";
            } catch (e) {}
        }),
        buttonAll.addEventListener("click", function (e) {
            e.stopPropagation();
            let t = window.getComputedStyle(dropSort);
            "none" == t.display ? ((dropSort.style.display = "block"), (buttonAll.style.backgroundColor = "#ededed"), (buttonAll.style.borderRadius = "4px")) : ((dropSort.style.display = "none"), (buttonAll.style.backgroundColor = "#fff"));
        }),
        $(".dropSort h3").click(function () {
            (sortSelect = $(this).text()),
                (document.querySelector("#all").innerHTML = sortSelect + "<span></span>"),
                console.log(sortSelect),
                (document.querySelector(".dropSort").style.display = "none"),
                (buttonAll.style.backgroundColor = "#fff"),
                (pageIndex = 1),
                (pageNumber.textContent = pageIndex),
                (lastVisible = void 0),
                getProduct();
        });
}
function checkCart() {
    (cart = JSON.parse(localStorage.getItem("cart"))),
        null == cart || 0 == cart.cartProduct.length ? ((cart = { cartProduct: [] }), (count.style.display = "none")) : ((count.style.display = "inline"), (count.textContent = cart.cartProduct.length));
}
function getProduct() {
    productContainer.innerHTML = "";
    var e = window.location.href,
        t = e.split("=")[1];
    (categorieSection = sectionTitle.textContent),
        null != t ? ((categorie = decodeURIComponent(t)), (sectionTitle.textContent = categorie), (productContainer.innerHTML = "")) : (categorie = null != categorieSection && "" != categorieSection ? categorieSection : "Produits");
    var o = database.collection(pays + "/Produit/List");
    "Best Fashion" == categorie
        ? (o = o.where("categorie", "array-contains-any", ["Vêtements Femme", "Vêtements Homme"]))
        : "Offres du jour" == categorie
        ? (o = o.where("deal", "==", !0))
        : "Produits" != categorie && (o = o.where("categorie", "array-contains", categorie)),
        null != sortSelect
            ? "Nouvel arrivage" == sortSelect
                ? (o = "Offres du jour" == categorie ? o.orderBy("dealTime", "desc") : o.orderBy("timestamp", "desc"))
                : "Prix croissant" == sortSelect
                ? (o = o.orderBy("prix", "asc"))
                : "Prix décroissant" == sortSelect && (o = o.orderBy("prix", "desc"))
            : (o = 1 == p1 ? o.orderBy("prix", "asc") : 0 == p1 ? o.orderBy("prix", "desc") : o.orderBy("timestamp", "desc")),
        1 == previous ? ((o = o.startAt(lastVisiblePrevious[pageIndex])), (previous = !1)) : null != lastVisible && (o = o.startAfter(lastVisible)),
        o
            .limit(20)
            .get()
            .then((e) => {
                20 == e.size
                    ? ((lastVisible = e.docs[e.docs.length - 1]), (lastVisiblePrevious[pageIndex] = e.docs[0]), (document.querySelector(".next").style.display = "inherit"))
                    : (document.querySelector(".next").style.display = "none"),
                    e.docs.forEach((e) => {
                        let t = document.createElement("div"),
                            o = document.createElement("a"),
                            r = document.createElement("img"),
                            n = document.createElement("div"),
                            i = document.createElement("div"),
                            c = document.createElement("div"),
                            a = document.createElement("div"),
                            d = document.createElement("div"),
                            l = document.createElement("div"),
                            s = document.createElement("div");
                        (t.className = "p-item"),
                            t.setAttribute("id", e.id),
                            o.setAttribute("data-id", e.id),
                            (r.className = "lazy"),
                            (r.src = "/image/placeholder_image.jpg"),
                            r.setAttribute("data-src", e.data().thumb),
                            (n.textContent = e.data().nom),
                            (n.className = "productName"),
                            (i.className = "productPrice"),
                            (c.className = "oldPrice"),
                            (a.className = "productRate"),
                            (d.className = "rate"),
                            (l.className = "promoCard");
                        let u = document.createElement("img");
                        (u.src = "/image/best_express.png"), (u.style.width = "100px"), (s.className = "productDelivery"), s.appendChild(u);
                        var p = e.data().star;
                        if (null != p && 0 != p) {
                            var m = (80 * p) / 5;
                            d.style.width = m + "px";
                        } else d.style.width = "80px";
                        null != e.data().promoCount && 0 != e.data().promoCount
                            ? ((i.innerHTML = e.data().prix.toLocaleString() + " FCFA"),
                              (c.innerHTML = "<del>" + e.data().oldPrix.toLocaleString() + " FCFA</del>"),
                              (l.textContent = e.data().promoCount + "%"),
                              (l.style.display = "inline-flex"))
                            : (i.textContent = e.data().prix.toLocaleString() + " FCFA"),
                            a.appendChild(d),
                            (o.href = createHref(e.data().nom_search, e.data().id)),
                            t.appendChild(o),
                            o.appendChild(r),
                            o.appendChild(n),
                            o.appendChild(i),
                            o.appendChild(c),
                            o.appendChild(a),
                            o.appendChild(l),
                            o.appendChild(s),
                            productContainer.appendChild(t);
                    }),
                    $(function () {
                        $(".lazy").Lazy();
                    }),
                    (buttonLoading.style.display = "none"),
                    20 == e.size || pageIndex > 1
                        ? (null != categorie && "Offres du jour" == categorie) || (document.querySelector(".productFooter").style.display = "flex")
                        : (document.querySelector(".productFooter").style.display = "none"),
                    1 == pageIndex ? ((document.querySelector(".prev").style.display = "none"), (document.querySelector(".next").style.display = "inherit")) : (document.querySelector(".prev").style.display = "inherit");
            });
}
function getCategoreSectionData() {
    var e = 1;
    $(".productSection").each(function () {
        var t = document.querySelector("#categorieProduct" + e);
        let o = $(this).find(".all"),
            r = o.attr("data-categorie");
        getCategoreSection(r, t), e++;
    });
}
function getCategoreSection(e, t) {
    var o = 1;
    database
        .collection(pays + "/Produit/List")
        .where("categorie", "array-contains", e)
        .orderBy("timestamp", "desc")
        .limit(6)
        .get()
        .then(function (e) {
            e.docs.forEach(function (e) {
                const r = t;
                r.querySelector(".item" + o);
                let n = r.querySelector(".productItem.item" + o),
                    i = r.querySelector(".productItem.item" + o + " a"),
                    c = r.querySelector(".productItem.item" + o + " img"),
                    a = r.querySelector(".productItem.item" + o + " .productName"),
                    d = r.querySelector(".productItem.item" + o + " .productPrice"),
                    l = r.querySelector(".productItem.item" + o + " .promoPrice"),
                    s = r.querySelector(".productItem.item" + o + " .promoCard");
                n.setAttribute("data-id", e.id),
                    (i.href = createHref(e.data().nom_search, e.data().id)),
                    (c.src = e.data().thumb),
                    (a.textContent = e.data().nom),
                    null != e.data().promoCount && 0 != e.data().promoCount
                        ? ((d.textContent = e.data().prix.toLocaleString() + " FCFA"),
                          (l.innerHTML = "<del>" + e.data().oldPrix.toLocaleString() + " FCFA</del>"),
                          (s.textContent = e.data().promoCount + "%"),
                          (s.style.display = "inline-flex"))
                        : (d.textContent = e.data().prix.toLocaleString() + " FCFA"),
                    o++;
            });
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
    measurementId: "G-GS2J296SBE",
};
firebase.initializeApp(firebaseConfig);
const database = firebase.firestore(),
    productContainer = document.querySelector(".product-content"),
    sectionTitle = document.querySelector(".product-list header h1"),
    buttonNavProduit = document.querySelector(".navProduit"),
    buttonAll = document.querySelector("#all"),
    buttonLoading = document.querySelector(".loadContainer"),
    count = document.querySelector(".count"),
    pageNumber = document.querySelector(".productFooter h5"),
    dropSort = document.querySelector(".dropSort");
let subSelect,
    subSelectOld,
    timeOutInit,
    OldPrixSelect,
    OldVoteSelect,
    OldGenreSelect,
    lastVisible,
    categorie,
    cart,
    p1,
    hoverCount = 0,
    previous = !1,
    sortSelect = "Nouvel arrivage",
    pageIndex = 1,
    lastVisiblePrevious = {};
var query = database.collection(pays).doc("Produit").collection("List");
setOnClick(),
    checkCart(),
    getCategoreSectionData(),
    getProduct(),
    $(function () {
        $(".lazy").Lazy();
    }),
    (pageNumber.textContent = pageIndex),
    $(document).ready(function () {
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
