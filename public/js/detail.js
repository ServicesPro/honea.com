"use strict";
function saveProductGet() {
    (product.id = $(".sectionDesc").attr("data-id")),
        (product.nom = h1.textContent),
        (product.nom_search = $(".sectionDesc").attr("data-search").split(",")),
        (product.marque = p.textContent),
        (product.promoCount = $(".promoCount").attr("data-value")),
        (product.oldPrix = $(".oldPrice").attr("data-value")),
        (product.prix = $(".sectionDesc h2").attr("data-prix")),
        (product.description = $(".ficheSection div").text()),
        (product.image = $(".productImage img").attr("src")),
        (product.image2 = $(".productImage img").attr("data-image2")),
        (product.image3 = $(".productImage img").attr("data-image3")),
        (product.thumb = $(".productImage img").attr("data-thumb")),
        (product.thumb2 = $(".productImage img").attr("data-thumb2")),
        (product.thumb3 = $(".productImage img").attr("data-thumb3")),
        (product.taille = $(".tailleSection").attr("data-value").split(",")),
        (product.couleur = $(".tailleSection").attr("data-couleur").split(",")),
        (product.caract = $(".caract").attr("data-value").split(",")),
        (product.caract2 = $(".caract2").attr("data-value").split(","));
}
function imageLoading() {
    $(".productImage img").on("load", function () {
        document.querySelector(".loadContainer").style.display = "none";
    }),
        $("#img3").on("load", function () {
            document.querySelector(".loadContainer").style.display = "none";
        });
}
function getProductDetail() {
    if (
        (("" == product.thumb2 && "" == product.thumb3) ||
            ((document.querySelector(".sectionImageMulti").style.display = "inline"),
            (document.querySelector("#img1").src = product.thumb),
            document.querySelector("#img1").addEventListener("click", function () {
                (document.querySelector(".loadContainer").style.display = "flex"), (img.src = product.image);
            })),
        "" != product.thumb2)
    ) {
        const e = document.querySelector("#img2");
        (e.style.display = "inline"),
            (e.src = product.thumb2),
            e.addEventListener("click", function () {
                (document.querySelector(".loadContainer").style.display = "flex"), (img.src = product.image2);
            });
    }
    if ("" != product.thumb3) {
        const e = document.querySelector("#img3");
        (e.style.display = "inline"),
            (e.src = product.thumb3),
            e.addEventListener("click", function () {
                (document.querySelector(".loadContainer").style.display = "flex"), (img.src = product.image3);
            });
    }
    null != product.caract &&
        null != product.caract &&
        "" != product.caract &&
        ((caract.innerHTML = ""),
        product.caract.forEach(function (e) {
            let t = document.createElement("li");
            (t.textContent = e), caract.appendChild(t);
        })),
        null !== product.caract2 &&
            null != product.caract2 &&
            "" != product.caract2 &&
            ((caract2.innerHTML = ""),
            product.caract2.forEach(function (e) {
                let t = document.createElement("li");
                (t.textContent = e), caract2.appendChild(t);
            })),
        null !== product.couleur &&
            null != product.couleur &&
            "" != product.couleur &&
            product.couleur.forEach(function (e) {
                let t = document.createElement("li");
                (t.textContent = "Couleur: " + e), caract2.appendChild(t);
            }),
        null !== product.taille &&
            null != product.taille &&
            "" != product.taille &&
            ((document.querySelector(".tailleSection").style.display = "block"),
            (detailCard.innerHTML = ""),
            product.taille.forEach(function (e) {
                let t = document.createElement("span");
                (t.textContent = e), detailCard.appendChild(t);
            }));
}
function getSimilarProduct() {
    var e,
        t = $(".part1").attr("data-categorie").split(",");
    e = 1 == t.length ? t[0] : 4 == t.length ? t[t.length - 2] : t[t.length - 1];
    let o = 1;
    database
        .collection(pays + "/Produit/List")
        .where("categorie", "array-contains", e)
        .limit(6)
        .get()
        .then(function (e) {
            e.docs.forEach(function (e) {
                const t = document.querySelector("#similarProduct");
                t.querySelector(".item" + o);
                let c = t.querySelector(".productItem.item" + o),
                    r = t.querySelector(".productItem.item" + o + " a"),
                    l = t.querySelector(".productItem.item" + o + " img"),
                    n = t.querySelector(".productItem.item" + o + " .productName"),
                    a = t.querySelector(".productItem.item" + o + " .productPrice");
                c.setAttribute("data-id", e.id), (r.href = createHref(e.data().nom_search, e.data().id)), (l.src = e.data().thumb), (n.textContent = e.data().nom), (a.textContent = e.data().prix + " FCFA"), o++;
            });
        });
}
function checkCart() {
    (cart = JSON.parse(localStorage.getItem("cart"))),
        null == cart || 0 == cart.cartProduct.length ? ((cart = { cartProduct: [] }), (count.style.display = "none")) : ((count.style.display = "inline"), (count.textContent = cart.cartProduct.length));
}
function setOnClick() {
    souCate.forEach(function (e) {
        e.addEventListener("click", function (t) {
            let o = e.textContent;
            var c = encodeURIComponent(o.trim()),
                r = "/categorie.html?categorie=" + c;
            window.location.href = r;
        });
    }),
        souCateTitle.forEach(function (e) {
            e.addEventListener("click", function () {
                let t = e.textContent;
                var o = encodeURIComponent(t.trim()),
                    c = "/categorie.html?categorie=" + o;
                window.location.href = c;
            });
        }),
        document.querySelector("#starM").addEventListener("click", function () {
            if (index > 1) {
                index--;
                for (var e = 1; e <= 5; e++)
                    document.querySelector("#vote" + e).style.backgroundImage =
                        "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23c7c7cd' width='16' height='12'%3E%3Cpath d='M8.58.38l1.35 2.86c.1.2.28.34.49.37l3.03.46c.53.08.74.77.35 1.16l-2.19 2.23a.7.7 0 0 0-.18.6l.52 3.15c.09.55-.47.97-.94.71l-2.7-1.49a.62.62 0 0 0-.61 0L5 11.93c-.48.25-1.04-.17-.95-.72l.52-3.15a.7.7 0 0 0-.18-.6l-2.2-2.23c-.38-.4-.17-1.08.36-1.16l3.03-.46c.21-.03.4-.17.49-.37L7.42.38c.24-.5.92-.5 1.16 0z'/%3E%3C/svg%3E\")";
                setStarSelect();
            }
        }),
        document.querySelector("#starP").addEventListener("click", function () {
            if (index < 5) {
                index++;
                for (var e = 1; e <= 5; e++)
                    document.querySelector("#vote" + e).style.backgroundImage =
                        "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23c7c7cd' width='16' height='12'%3E%3Cpath d='M8.58.38l1.35 2.86c.1.2.28.34.49.37l3.03.46c.53.08.74.77.35 1.16l-2.19 2.23a.7.7 0 0 0-.18.6l.52 3.15c.09.55-.47.97-.94.71l-2.7-1.49a.62.62 0 0 0-.61 0L5 11.93c-.48.25-1.04-.17-.95-.72l.52-3.15a.7.7 0 0 0-.18-.6l-2.2-2.23c-.38-.4-.17-1.08.36-1.16l3.03-.46c.21-.03.4-.17.49-.37L7.42.38c.24-.5.92-.5 1.16 0z'/%3E%3C/svg%3E\")";
                setStarSelect();
            }
        }),
        document.querySelector(".wrapper3").addEventListener("click", function () {
            let e = commentaire.value;
            null != e && "" != e ? ((bgModal.style.display = "none"), (popupDiv.className = "popupLoading"), checkComentaire(e)) : alert("Veuillez renseigner votre méssage...");
        }),
        cartPopupClose1.addEventListener("click", function () {
            popupCart1.style.display = "none";
        }),
        cartPopupClose2.addEventListener("click", function (e) {
            (popupCart2.style.display = "none"), (product.couleurSelect = void 0), (product.tailleSelect = void 0);
        }),
        document.querySelector(".option1").addEventListener("click", function () {
            popupCart1.style.display = "none";
        }),
        document.querySelector(".option2").addEventListener("click", function () {
            window.location.href = "/panier.html";
        }),
        document.querySelector(".fbShare").addEventListener("click", function () {
            shareFacebook();
        }),
        document.querySelector(".twShare").addEventListener("click", function () {
            shareTwitter();
        }),
        rateButton.addEventListener("click", function () {
            (document.querySelector("body").style.position = "fixed"), (document.querySelector("body").style.width = "100%"), (bgModal.style.display = "flex"), setStarSelect();
        }),
        document.querySelector(".closePopup").addEventListener("click", function () {
            (document.querySelector("body").style.position = "initial"), (bgModal.style.display = "none");
        }),
        document.querySelector(".btn_buy").addEventListener("click", function () {
            void 0 !== product.couleur &&
                ((document.querySelector(".couleurSectionP").style.display = "block"),
                (couleurCardP.textContent = ""),
                product.couleur.forEach(function (e) {
                    let t = document.createElement("span");
                    (t.textContent = e),
                        t.addEventListener("click", function () {
                            null != oldCouleur && (oldCouleur.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldCouleur = t), (product.couleurSelect = t.textContent);
                        }),
                        couleurCardP.appendChild(t);
                })),
                void 0 !== product.taille &&
                    ((document.querySelector(".tailleSectionP").style.display = "block"),
                    (detailCardP.textContent = ""),
                    product.taille.forEach(function (e) {
                        let t = document.createElement("span");
                        (t.textContent = e),
                            t.addEventListener("click", function () {
                                null != oldTaille && (oldTaille.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldTaille = t), (product.tailleSelect = t.textContent);
                            }),
                            detailCardP.appendChild(t);
                    })),
                addToCartCheckUnique();
        }),
        document.querySelector(".btn_buyM").addEventListener("click", function () {
            void 0 !== product.couleur &&
                ((document.querySelector(".couleurSectionP").style.display = "block"),
                (couleurCardP.textContent = ""),
                product.couleur.forEach(function (e) {
                    let t = document.createElement("span");
                    (t.textContent = e),
                        t.addEventListener("click", function () {
                            null != oldCouleur && (oldCouleur.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldCouleur = t), (product.couleurSelect = t.textContent);
                        }),
                        couleurCardP.appendChild(t);
                })),
                void 0 !== product.taille &&
                    ((document.querySelector(".tailleSectionP").style.display = "block"),
                    (detailCardP.textContent = ""),
                    product.taille.forEach(function (e) {
                        let t = document.createElement("span");
                        (t.textContent = e),
                            t.addEventListener("click", function () {
                                null != oldTaille && (oldTaille.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldTaille = t), (product.tailleSelect = t.textContent);
                            }),
                            detailCardP.appendChild(t);
                    })),
                addToCartCheckUnique();
        }),
        document.querySelector(".btn_add").addEventListener("click", function (e) {
            void 0 !== product.couleur &&
                "" != product.couleur &&
                ((couleurCardP.textContent = ""),
                (document.querySelector(".couleurSectionP").style.display = "block"),
                product.couleur.forEach(function (e) {
                    let t = document.createElement("span");
                    (t.textContent = e),
                        t.addEventListener("click", function () {
                            null != oldCouleur && (oldCouleur.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldCouleur = t), (product.couleurSelect = t.textContent);
                        }),
                        couleurCardP.appendChild(t);
                })),
                void 0 !== product.taille &&
                    ((detailCardP.textContent = ""),
                    (document.querySelector(".tailleSectionP").style.display = "block"),
                    product.taille.forEach(function (e) {
                        let t = document.createElement("span");
                        (t.textContent = e),
                            t.addEventListener("click", function () {
                                null != oldTaille && (oldTaille.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldTaille = t), (product.tailleSelect = t.textContent);
                            }),
                            detailCardP.appendChild(t);
                    })),
                addToCartCheck();
        }),
        document.querySelector(".btn_addM").addEventListener("click", function () {
            void 0 !== product.couleur &&
                "" != product.couleur &&
                ((couleurCardP.textContent = ""),
                (document.querySelector(".couleurSectionP").style.display = "block"),
                product.couleur.forEach(function (e) {
                    let t = document.createElement("span");
                    (t.textContent = e),
                        t.addEventListener("click", function () {
                            null != oldCouleur && (oldCouleur.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldCouleur = t), (product.couleurSelect = t.textContent);
                        }),
                        couleurCardP.appendChild(t);
                })),
                void 0 !== product.taille &&
                    ((detailCardP.textContent = ""),
                    (document.querySelector(".tailleSectionP").style.display = "block"),
                    product.taille.forEach(function (e) {
                        let t = document.createElement("span");
                        (t.textContent = e),
                            t.addEventListener("click", function () {
                                null != oldTaille && (oldTaille.style.color = "#282828"), (t.style.color = "#b32020"), (t.style.fontWeight = "500"), (oldTaille = t), (product.tailleSelect = t.textContent);
                            }),
                            detailCardP.appendChild(t);
                    })),
                addToCartCheck();
        }),
        document.querySelector("body").addEventListener("click", function () {
            (drawerMenu.style.transform = "translateX(-100%)"), (document.querySelector("body").style.position = "initial");
        });
}
function getFavoriteData() {
    let e = database.collection(pays).doc("Users").collection("List").doc(firebase.auth().currentUser.uid);
    e.get()
        .then(function (e) {
            if (e.exists)
                if (((userFavorite = e.data().favorite), null == userFavorite))
                    (userFavorite = []),
                        document.querySelector(".like img").setAttribute("src", "/icon/ic_coeur.svg"),
                        document.querySelector(".like").addEventListener("click", function (e) {
                            (popupDiv.className = "popupLoading"), saveNewFavorite();
                        });
                else {
                    let e = 0;
                    for (var t = 0; t < userFavorite.length; t++) product.id == userFavorite[t] && (e = 1);
                    0 == e
                        ? (document.querySelector(".like img").setAttribute("src", "/icon/ic_coeur.svg"),
                          document.querySelector(".like").addEventListener("click", function (e) {
                              (popupDiv.className = "popupLoading"), saveNewFavorite();
                          }))
                        : (document.querySelector(".like img").setAttribute("src", "/icon/ic_coeur_filled.svg"),
                          document.querySelector(".like").addEventListener("click", function (e) {
                              (popupDiv.className = "popupLoading"), userFavorite.pop(product.id), updateFavorite();
                          }));
                }
            else console.log("Données introuvables...");
        })
        .catch(function (e) {
            (popupDiv.className = "popupLoadingClose"), console.log(e);
        });
}
function saveNewFavorite() {
    userFavorite.unshift(product.id), userFavorite.length >= 10 && userFavorite.pop();
    let e = database.collection(pays).doc("Users").collection("List").doc(firebase.auth().currentUser.uid);
    var t = { favorite: userFavorite };
    e.update(t).then(function (e) {
        return (popupDiv.className = "popupLoadingClose"), location.reload(), !1;
    });
}
function updateFavorite() {
    let e = database.collection(pays).doc("Users").collection("List").doc(firebase.auth().currentUser.uid);
    var t = { favorite: userFavorite };
    e.update(t).then(function (e) {
        return (popupDiv.className = "popupLoadingClose"), location.reload(), !1;
    });
}
function addToCartCheck() {
    let e = 0;
    for (var t = 0; t < cart.cartProduct.length; t++) product.nom == cart.cartProduct[t].nom && (e = 1);
    0 == e
        ? (null != product.couleur && "" != product.couleur) || (null != product.taille && "" != product.taille)
            ? ((cartProductName2.textContent = product.nom),
              (popupCart2.style.display = "flex"),
              document.querySelector(".option0").addEventListener("click", function (e) {
                  e.stopImmediatePropagation(),
                      null != product.couleur && "" != product.couleur && null == product.couleurSelect
                          ? alert("Veuillez sélectionner la couleur...")
                          : null != product.taille && "" != product.taille && null == product.tailleSelect
                          ? alert("Veuillez sélectionner la taille...")
                          : ((popupCart2.style.display = "none"), (cartProductName.textContent = product.nom), (popupCart1.style.display = "flex"), addToCart());
              }))
            : ((cartProductName.textContent = product.nom), (popupCart1.style.display = "flex"), addToCart())
        : alert("Ce produit est déja dans le panier");
}
function addToCartCheckUnique() {
    let e = 0;
    for (var t = 0; t < cart.cartProduct.length; t++) product.nom == cart.cartProduct[t].nom && (e = 1);
    0 == e
        ? (null != product.couleur && "" != product.couleur) || (null != product.taille && "" != product.taille)
            ? ((cartProductName2.textContent = product.nom),
              (popupCart2.style.display = "flex"),
              document.querySelector(".option0").addEventListener("click", function () {
                  console.log(product.couleurSelect),
                      null != product.couleur && "" != product.couleur && null == product.couleurSelect
                          ? alert("Veuillez sélectionner la couleur...")
                          : null != product.taille && "" != product.taille && null == product.tailleSelect
                          ? alert("Veuillez sélectionner la taille...")
                          : addToCartUnique();
              }))
            : addToCartUnique()
        : alert("Ce produit est déja dans le panier");
}
function addToCart() {
    (product.quantite = 1), cart.cartProduct.push(product), console.log(product), localStorage.setItem("cart", JSON.stringify(cart)), (count.style.display = "inline"), (count.textContent = cart.cartProduct.length);
}
function addToCartUnique() {
    let e = 0;
    for (var t = 0; t < cart.cartProduct.length; t++) product.nom == cart.cartProduct[t].nom && (e = 1);
    0 == e
        ? ((product.quantite = 1),
          cart.cartProduct.push(product),
          localStorage.setItem("cart", JSON.stringify(cart)),
          (count.style.display = "inline"),
          (count.textContent = cart.cartProduct.length),
          (document.querySelector(".btn_connect span").textContent = username),
          (window.location.href = "/panier.html"))
        : ((document.querySelector(".btn_connect span").textContent = username), (window.location.href = "/panier.html"));
}
function saveVueProduct() {
    if (((vue = JSON.parse(localStorage.getItem("vueProduct"))), null == vue || 0 == vue.get.length)) (vue = { get: [] }), vue.get.push(product.id), localStorage.setItem("vueProduct", JSON.stringify(vue));
    else {
        let t = 0;
        for (var e = 0; e < vue.get.length; e++) product.id == vue.get[e] && (t = 1);
        0 == t && (vue.get.unshift(product.id), vue.get.length >= 8 && vue.get.pop(), localStorage.setItem("vueProduct", JSON.stringify(vue)));
    }
}
function shareFacebook() {
    var e;
    "Togo" == pays
        ? (e = "https://www.achetia.com" + createHref(product.nom_search, product.id))
        : "Benin" == pays
        ? (e = "https.bj://www.achetia.com" + createHref(product.nom_search, product.id))
        : "CoteDivoire" == pays && (e = "https://www.ci.achetia.com" + createHref(product.nom_search, product.id)),
        window.open("https://www.facebook.com/sharer/sharer.php?u=" + e);
}
function shareTwitter() {
    var e;
    "Togo" == pays
        ? (e = "https://www.achetia.com" + createHref(product.nom_search, product.id))
        : "Benin" == pays
        ? (e = "https.bj://www.achetia.com" + createHref(product.nom_search, product.id))
        : "CoteDivoire" == pays && (e = "https://www.ci.achetia.com" + createHref(product.nom_search, product.id)),
        window.open("https://twitter.com/intent/tweet?url=" + e);
}
function getProductAvis() {
    var e = $(".sectionDesc").attr("data-id");
    database
        .collection(pays + "/Vote/" + e)
        .orderBy("timestamp", "desc")
        .get()
        .then(function (e) {
            e.size > 0 && (document.querySelector("#aviSection").style.display = "block"),
                e.docs.forEach(function (e) {
                    let t = document.createElement("div");
                    t.className = "avisContainer";
                    let o = document.createElement("div");
                    o.className = "aviWrapper";
                    let c = document.createElement("div");
                    (c.className = "aviRate"), (c.style.width = 20 * e.data().star + "px");
                    let r = document.createElement("p"),
                        l = document.createElement("h4");
                    (r.textContent = e.data().message), (l.textContent = "Par " + e.data().nom), o.appendChild(c), t.appendChild(o), t.appendChild(r), t.appendChild(l), aviContent.appendChild(t);
                });
        });
}
function checkComentaire(e) {
    firebase.auth().onAuthStateChanged(function (t) {
        null == t ? (console.log(t), localStorage.setItem("username", ""), localStorage.setItem("userphone", ""), (window.location.href = "/connection.html")) : saveCommentaire(e);
    });
}
function saveCommentaire(e) {
    firebase.auth().onAuthStateChanged(function (t) {
        if (null == t) console.log(t), localStorage.setItem("username", ""), localStorage.setItem("userphone", ""), (window.location.href = "/connection.html");
        else {
            let t = database.collection(pays).doc("Vote").collection(product.id).doc(firebase.auth().currentUser.uid);
            var o = { nom: localStorage.getItem("username"), uid: firebase.auth().currentUser.uid, star: index, productId: product.id, message: e, timestamp: firebase.firestore.FieldValue.serverTimestamp() };
            t.set(o).then(function () {
                console.log("Commentaire bien save"), (document.querySelector("body").style.position = "initial"), (popupDiv.className = "popupLoadingClose"), (aviContent.innerHTML = ""), getProductAvis();
            });
        }
    });
}
function fixSellerSection() {
    window.pageYOffset > sticky ? (sellerSection.className = "sticky") : (sellerSection.className = "");
}
function setStarSelect() {
    for (var e = 1; e <= index; e++)
        document.querySelector("#vote" + e).style.backgroundImage =
            "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23741414' width='16' height='12'%3E%3Cpath d='M8.58.38l1.35 2.86c.1.2.28.34.49.37l3.03.46c.53.08.74.77.35 1.16l-2.19 2.23a.7.7 0 0 0-.18.6l.52 3.15c.09.55-.47.97-.94.71l-2.7-1.49a.62.62 0 0 0-.61 0L5 11.93c-.48.25-1.04-.17-.95-.72l.52-3.15a.7.7 0 0 0-.18-.6l-2.2-2.23c-.38-.4-.17-1.08.36-1.16l3.03-.46c.21-.03.4-.17.49-.37L7.42.38c.24-.5.92-.5 1.16 0z'/%3E%3C/svg%3E\")";
}
function getProductFromUrl() {
    let e = window.location.href,
        t = e.split("=")[1];
    database
        .collection(pays + "/Produit/List")
        .where("id", "==", t)
        .get()
        .then((e) => {
            e.docs.forEach((e) => {
                console.log(e.data()), (product = e.data()), getProductDetail(), setMetaData();
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
    auth = firebase.auth(),
    defaultAnalytics = firebase.analytics(),
    souCate = document.querySelectorAll(".cat-itm"),
    souCateTitle = document.querySelectorAll(".cat-title"),
    h1 = document.querySelector(".sectionDesc h1"),
    p = document.querySelector(".sectionDesc p"),
    h2 = document.querySelector(".sectionDesc h2"),
    img = document.querySelector(".productImage img"),
    loadContainer = document.querySelector(".loadContainer"),
    promoCountDiv = document.querySelector(".promoCount"),
    oldPrice = document.querySelector(".oldPrice"),
    promoCard = document.querySelector(".promoCard"),
    rateButton = document.querySelector(".rateSection span"),
    bgModal = document.querySelector(".bgModal"),
    count = document.querySelector(".count"),
    caract = document.querySelector(".caract"),
    caract2 = document.querySelector(".caract2"),
    detailCard = document.querySelector(".detailCard"),
    couleurCardP = document.querySelector(".couleurCardP"),
    detailCardP = document.querySelector(".detailCardP"),
    popupCart1 = document.querySelector("#cartDialog"),
    cartProductName = document.querySelector(".popupCart1 h2"),
    popupCart2 = document.querySelector(".popupCart2"),
    cartProductName2 = document.querySelector(".popupCart2 h1"),
    cartPopupClose1 = document.querySelector(".cont1 img"),
    cartPopupClose2 = document.querySelector(".co1 img"),
    commentaire = document.querySelector("#commentaire"),
    aviContent = document.querySelector("#aviContent"),
    rate = document.querySelector(".rate"),
    sellerSection = document.querySelector("#sellerSection");
let subSelect,
    subSelectOld,
    timeOutInit,
    sticky = sellerSection.offsetTop - 65,
    hoverCount = 0;
var cart;
let userFavorite,
    vue,
    couleurSelect,
    tailleSelect,
    oldTaille,
    oldCouleur,
    product = {},
    index = 5;
firebase.auth().onAuthStateChanged(function (e) {
    null == e ? document.querySelector(".like img").setAttribute("src", "/icon/ic_coeur.svg") : getFavoriteData();
}),
    saveProductGet(),
    checkCart(),
    getProductDetail(),
    imageLoading(),
    getSimilarProduct(),
    setOnClick(),
    getProductAvis(),
    saveVueProduct(),
    document.querySelector("#drawer-icon").addEventListener("click", function (e) {}),
    (window.onscroll = function () {
        fixSellerSection();
    }),
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
