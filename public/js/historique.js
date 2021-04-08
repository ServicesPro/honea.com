function checkCart() {
    (cart = JSON.parse(localStorage.getItem("cart"))),
        null == cart || 0 == cart.cartProduct.length ? ((cart = { cartProduct: [] }), (count.style.display = "none")) : ((count.style.display = "inline"), (count.textContent = cart.cartProduct.length));
}
function getVente(e) {
    console.log(e),
        database
            .collection("Togo/Sale/Collection")
            .where("uid", "==", e)
            .get()
            .then(function (e) {
                0 == e.size ? (document.querySelector(".empty").style.display = "flex") : (document.querySelector(".empty").style.display = "none"),
                    e.docs.forEach(function (e) {
                        let t = document.createElement("div");
                        t.className = "product";
                        let n = document.createElement("div");
                        n.className = "image";
                        let o = document.createElement("div");
                        o.className = "icon";
                        let a = document.createElement("img");
                        (a.src = "../icon/checked.svg"), (a.height = "20"), (a.width = "20"), o.appendChild(a);
                        let c = document.createElement("div");
                        c.className = "myPrix";
                        let i = document.createElement("h3"),
                            r = e.data().quantite * e.data().prix;
                        (i.textContent = r.toLocaleString() + " FCFA"), c.appendChild(i);
                        let d = document.createElement("h1"),
                            l = document.createElement("h2");
                        (d.textContent = e.data().nom), (l.textContent = "Date: " + e.data().date);
                        let u = document.createElement("div");
                        (u.className = "name"), u.appendChild(d), u.appendChild(l), u.appendChild(c);
                        let s = document.createElement("img");
                        (s.src = e.data().image), (s.height = "60"), (s.width = "60"), n.appendChild(s), n.appendChild(u), t.appendChild(n), t.appendChild(o), root.appendChild(t);
                    });
            }),
        (buttonLoading.style.display = "none");
}
function setOnClick() {
    buttonNavProduit.addEventListener("click", function () {
        window.location.href = "/pages/produit.html";
    }),
        document.querySelector("#drawer-icon").addEventListener("click", function () {
            window.location.href = "/";
        }),
        buttonHome.addEventListener("click", function () {
            window.location.href = "/";
        }),
        document.querySelector("#menuCart").addEventListener("click", function () {
            window.location.href = "/panier.html";
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
const database = firebase.firestore(),
    auth = firebase.auth();
firebase.auth().onAuthStateChanged(function (e) {
    null == e ? (console.log(e), localStorage.setItem("username", ""), localStorage.setItem("userphone", ""), (window.location.href = "login.html")) : ((uid = auth.currentUser.uid), getVente(auth.currentUser.uid));
});
let root = document.querySelector(".productWrapper");
const count = document.querySelector(".count"),
    buttonHome = document.querySelector(".navHome"),
    buttonNavProduit = document.querySelector(".navProduit"),
    buttonLoading = document.querySelector(".loadContainer");
var cart;
let product;
checkCart(), setOnClick();
