function getNotificationData(t) {
    database
        .collection(pays + "/Notification/" + t)
        .orderBy("timestamp", "desc")
        .limit(1)
        .get()
        .then(function (t) {
            0 != t.lenght &&
                t.forEach(function (t) {
                    var e = t.data().read;
                    0 == e
                        ? ((document.querySelector(".notification-new").style.display = "flex"), localStorage.setItem("notification", "oui"))
                        : ((document.querySelector(".notification-new").style.display = "none"), localStorage.setItem("notification", "non"));
                });
        });
}

function getSliderImage() {
    database
        .doc(pays + "/Slide/Image/Link")
        .get()
        .then(function (t) {
            (sliderContent1 = t.data().image1),
                (sliderContent2 = t.data().image2),
                (sliderContent3 = t.data().image3),
                (sliderContent4 = t.data().image4),
                (sliderContent5 = t.data().image5),
                (sliderContent6 = t.data().image6),
                (sliderContent7 = t.data().image7),
                (sliderContent8 = t.data().image8),
                // createImageSlider([t.data().slide1, t.data().slide2, t.data().slide3, t.data().slide4, t.data().slide5]);
                console.log("ok");
                let images = [
                    "image/a.jpeg",
                    "image/b.jpeg",
                    "image/c.jpeg",
                    "image/a.jpeg",
                    "image/b.jpeg",
                ]

                // alert(images);

                createImageSlider(images);
            try {
                $("#slidi1").attr({ "data-type": t.data().slide1_type, "data-id": t.data().slide1_id, "data-nom": t.data().slide1_nom }),
                    $("#slido2").attr({ "data-type": t.data().slide2_type, "data-id": t.data().slide2_id, "data-nom": t.data().slide2_nom }),
                    $("#slidn3").attr({ "data-type": t.data().slide3_type, "data-id": t.data().slide3_id, "data-nom": t.data().slide3_nom }),
                    $("#slidm4").attr({ "data-type": t.data().slide4_type, "data-id": t.data().slide4_id, "data-nom": t.data().slide4_nom }),
                    $("#slid5").attr({ "data-type": t.data().slide5_type, "data-id": t.data().slide5_id, "data-nom": t.data().slide5_nom }),
                    $(".slido").click(function () {
                        if ("produit" == $(this).attr("data-type")) {
                            var t = createHref($(this).attr("data-nom").split(","), $(this).attr("data-id"));
                            $(this).parent().attr("href", t);
                        } else if ("categorie" == $(this).attr("data-type")) {
                            let t = $(this).attr("data-id");
                            window.location.href = "/categorie.html?categorie=" + t;
                        }
                    });
            } catch (t) {}
            window.innerWidth <= 768
                ? (document
                      .querySelector("#flyer1 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie1_mini.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer2 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie2_mini.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer3 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie3_mini.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer4 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie4_mini.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer5 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie5_mini.gif?alt=media&token=7d0b2589f-aa2d-4d1b-92a5-862785aa3827"),
                  document
                      .querySelector("#flyer6 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie6_mini.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer7 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie7_mini.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer8 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie8_mini.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"))
                : (document
                      .querySelector("#flyer1 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie1.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer2 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie2.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer3 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie3.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer4 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie4.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer5 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie5.gif?alt=media&token=7d0b2589-aa2fd-4d1b-92a5-862785aa3827"),
                  document
                      .querySelector("#flyer6 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie6.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer7 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie7.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2"),
                  document
                      .querySelector("#flyer8 img")
                      .setAttribute("data-src", "https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/" + pays + "%2FSlide%2Fcategorie8.jpg?alt=media&token=254edc7b-54c3-4897-a951-c32ffea662d2")),
                $(function () {
                    $(".lazy").Lazy();
                }),
                document.querySelector("#flyer1").addEventListener("click", function () {
                    setSliderContentData(sliderContent1);
                }),
                document.querySelector("#flyer2").addEventListener("click", function () {
                    setSliderContentData(sliderContent2);
                }),
                document.querySelector("#flyer3").addEventListener("click", function () {
                    setSliderContentData(sliderContent3);
                }),
                document.querySelector("#flyer4").addEventListener("click", function () {
                    setSliderContentData(sliderContent4);
                }),
                document.querySelector("#flyer5").addEventListener("click", function () {
                    setSliderContentData(sliderContent5);
                }),
                document.querySelector("#flyer6").addEventListener("click", function () {
                    setSliderContentData(sliderContent6);
                }),
                document.querySelector("#flyer7").addEventListener("click", function () {
                    setSliderContentData(sliderContent7);
                }),
                document.querySelector("#flyer8").addEventListener("click", function () {
                    setSliderContentData(sliderContent8);
                });
        });
}

function setSliderContentData(t) {
    var e = t.split("-")[0],
        a = t.split("-")[1];
    if ("categorie" == e) window.location.href = "/categorie.html?categorie=" + a;
    else if ("produit" == e) window.open("/lien-slide-produit-" + a, "_blank");
    else if ("link" == e) {
        var o = t.slice(5, t.lenght);
        window.open(o);
    }
}
function getProductCategorie1() {
    let t = 1;
    database
        .collection(pays + "/Produit/List")
        .where("categorie", "array-contains", "Electroménager")
        .limit(6)
        .get()
        .then(function (e) {
            e.docs.forEach(function (e) {
                const a = document.querySelector("#categorieProduct1");
                a.querySelector(".item" + t);
                let o = a.querySelector(".productItem.item" + t + " a"),
                    i = a.querySelector(".productItem.item" + t + " img"),
                    r = a.querySelector(".productItem.item" + t + " .productName"),
                    d = a.querySelector(".productItem.item" + t + " .productPrice"),
                    c = a.querySelector(".productItem.item" + t + " .promoPrice"),
                    n = a.querySelector(".productItem.item" + t + " .promoCard");
                o.setAttribute("data-id", e.id),
                    (o.href = createHref(e.data().nom_search, e.data().id)),
                    (o.style.paddingBottom = "10px"),
                    i.setAttribute("data-src", e.data().thumb),
                    (r.textContent = e.data().nom),
                    null != e.data().promoCount && 0 != e.data().promoCount
                        ? ((d.innerHTML = e.data().prix.toLocaleString() + " FCFA"),
                          (c.innerHTML = "<del>" + e.data().oldPrix.toLocaleString() + " FCFA</del>"),
                          (n.textContent = e.data().promoCount + "%"),
                          (n.style.display = "inline-flex"))
                        : ((d.textContent = e.data().prix.toLocaleString() + " FCFA"), (d.style.paddingBottom = "16px")),
                    t++;
            }),
                getProductCategorie2();
        });
}
function getProductCategorie2() {
    let t = 1;
    database
        .collection(pays + "/Produit/List")
        .where("categorie", "array-contains", "Mode Femme")
        .limit(6)
        .get()
        .then(function (e) {
            e.docs.forEach(function (e) {
                const a = document.querySelector("#categorieProduct2");
                a.querySelector(".item" + t);
                let o = a.querySelector(".productItem.item" + t + " a"),
                    i = a.querySelector(".productItem.item" + t + " img"),
                    r = a.querySelector(".productItem.item" + t + " .productName"),
                    d = a.querySelector(".productItem.item" + t + " .productPrice"),
                    c = a.querySelector(".productItem.item" + t + " .promoPrice"),
                    n = a.querySelector(".productItem.item" + t + " .promoCard");
                o.setAttribute("data-id", e.id),
                    (o.href = createHref(e.data().nom_search, e.data().id)),
                    (o.style.paddingBottom = "10px"),
                    i.setAttribute("data-src", e.data().thumb),
                    (r.textContent = e.data().nom),
                    null != e.data().promoCount && 0 != e.data().promoCount
                        ? ((d.innerHTML = e.data().prix.toLocaleString() + " FCFA"),
                          (c.innerHTML = "<del>" + e.data().oldPrix.toLocaleString() + " FCFA</del>"),
                          (n.textContent = e.data().promoCount + "%"),
                          (n.style.display = "inline-flex"))
                        : ((d.textContent = e.data().prix.toLocaleString() + " FCFA"), (d.style.paddingBottom = "16px")),
                    t++;
            }),
                getProductCategorie3();
        });
}
function getProductCategorie3() {
    let t = 1;
    database
        .collection(pays + "/Produit/List")
        .where("categorie", "array-contains", "Mode Homme")
        .limit(6)
        .get()
        .then(function (e) {
            e.docs.forEach(function (e) {
                const a = document.querySelector("#categorieProduct3");
                a.querySelector(".item" + t);
                let o = a.querySelector(".productItem.item" + t + " a"),
                    i = a.querySelector(".productItem.item" + t + " img"),
                    r = a.querySelector(".productItem.item" + t + " .productName"),
                    d = a.querySelector(".productItem.item" + t + " .productPrice"),
                    c = a.querySelector(".productItem.item" + t + " .promoPrice"),
                    n = a.querySelector(".productItem.item" + t + " .promoCard");
                o.setAttribute("data-id", e.id),
                    (o.href = createHref(e.data().nom_search, e.data().id)),
                    (o.style.paddingBottom = "10px"),
                    i.setAttribute("data-src", e.data().thumb),
                    (r.textContent = e.data().nom),
                    null != e.data().promoCount && 0 != e.data().promoCount
                        ? ((d.innerHTML = e.data().prix.toLocaleString() + " FCFA"),
                          (c.innerHTML = "<del>" + e.data().oldPrix.toLocaleString() + " FCFA</del>"),
                          (n.textContent = e.data().promoCount + "%"),
                          (n.style.display = "inline-flex"))
                        : ((d.textContent = e.data().prix.toLocaleString() + " FCFA"), (d.style.paddingBottom = "16px")),
                    t++;
            }),
                getProductCategorie4();
        });
}
function getProductCategorie4() {
    let t = 1;
    database
        .collection(pays + "/Produit/List")
        .where("categorie", "array-contains", "Pack")
        .limit(6)
        .get()
        .then(function (e) {
            e.docs.forEach(function (e) {
                const a = document.querySelector("#categorieProduct4");
                a.querySelector(".item" + t);
                let o = a.querySelector(".productItem.item" + t + " a"),
                    i = a.querySelector(".productItem.item" + t + " img"),
                    r = a.querySelector(".productItem.item" + t + " .productName"),
                    d = a.querySelector(".productItem.item" + t + " .productPrice"),
                    c = a.querySelector(".productItem.item" + t + " .promoPrice"),
                    n = a.querySelector(".productItem.item" + t + " .promoCard");
                o.setAttribute("data-id", e.id),
                    (o.href = createHref(e.data().nom_search, e.data().id)),
                    (o.style.paddingBottom = "10px"),
                    i.setAttribute("data-src", e.data().thumb),
                    (r.textContent = e.data().nom),
                    null != e.data().promoCount && 0 != e.data().promoCount
                        ? ((d.innerHTML = e.data().prix.toLocaleString() + " FCFA"),
                          (c.innerHTML = "<del>" + e.data().oldPrix.toLocaleString() + " FCFA</del>"),
                          (n.textContent = e.data().promoCount + "%"),
                          (n.style.display = "inline-flex"))
                        : ((d.textContent = e.data().prix.toLocaleString() + " FCFA"), (d.style.paddingBottom = "16px")),
                    t++;
            });
        });
}
function checkDevice() {
    /iPhone|iPad|iPod|Android/.test(window.navigator.userAgent);
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
    auth = firebase.auth(),
    defaultAnalytics = firebase.analytics();
var sliderContent1, sliderContent2, sliderContent3, sliderContent4, sliderContent5, sliderContent6, sliderContent7, sliderContent8;
$("document").ready(function () {
    getSliderImage();
}),
    firebase.auth().onAuthStateChanged(function (t) {
        null != t ? getNotificationData(t.uid) : console.log("non");
    });
