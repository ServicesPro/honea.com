"use strict";
function setOnClick() {
    document.querySelector("#menuCart").addEventListener("click", function () {
        window.location.href = "/panier.html";
    }),
        btnConnection.addEventListener("click", function (e) {
            if ((e.preventDefault(), (nom = formNom.value), (index = formIndex.value), (phone = formNumber.value), "" == nom)) formNom.focus(), showErrorDialog("Veuillez renseigner votre nom");
            else if ("" == index) formIndex.focus(), showErrorDialog("Veuillez renseigner l'index de votre pays");
            else if ("" == phone) formNumber.focus(), showErrorDialog("Veuillez renseigner votre numéro de téléphone");
            else {
                popupDiv.className = "popupLoading";
                const e = paysIndex + phone,
                    o = window.recaptchaVerifier;
                auth.signInWithPhoneNumber(e, o)
                    .then(function (e) {
                        (popupDiv.className = "popupLoadingClose"),
                            (h1.textContent = "Message envoyer au +228" + phone),
                            (btnCode.textContent = "VALIDER L'INSCRIPTION"),
                            (document.querySelector("#formName").style.display = "none"),
                            (document.querySelector("#formNumberContainer").style.display = "none"),
                            (document.querySelector("#recaptcha-container").style.display = "none"),
                            (btnConnection.style.display = "none"),
                            (btnGmail.style.display = "none"),
                            (formCodeContainer.style.display = "block"),
                            (btnCode.style.display = "flex");
                        const o = e.verificationId;
                        btnCode.addEventListener("click", function () {
                            let e = formCode.value;
                            if ("" == e) showErrorDialog("Veuillez renseigner le code de vérification...");
                            else {
                                popupDiv.className = "popupLoading";
                                const t = firebase.auth.PhoneAuthProvider.credential(o, e);
                                auth.signInWithCredential(t)
                                    .then(function () {
                                        checkUserOnDatabase();
                                    })
                                    .catch(function (e) {
                                        (popupDiv.className = "popupLoadingClose"), showErrorDialog("Une erreur s'est produite: " + e.message), console.log(e.message);
                                    });
                            }
                        }),
                            (window.confirmationResult = e);
                    })
                    .catch(function (e) {
                        (popupDiv.className = "popupLoadingClose"), showErrorDialog("Une erreur s'est produite: " + e.message), console.log(e.message);
                    });
            }
        }),
        btnGmail.addEventListener("click", function () {
            firebase
                .auth()
                .signInWithPopup(provider)
                .then(function (e) {
                    e.credential.accessToken;
                    var o = e.user;
                    console.log(o),
                        (h1.textContent = "Email: " + o.email),
                        (labelNumber.textContent = "Votre numéro de téléphone"),
                        (document.querySelector("#formName").style.display = "none"),
                        (document.querySelector("#formNumberContainer").style.display = "none"),
                        (document.querySelector("#recaptcha-container").style.display = "none"),
                        (btnConnection.style.display = "none"),
                        (btnGmail.style.display = "none"),
                        (formCodeContainer.style.display = "block"),
                        (btnCode.style.display = "flex"),
                        btnCode.addEventListener("click", function () {
                            let e = formCode.value;
                            "" == e ? showErrorDialog("Veuillez renseigner votre numéro de téléphone...") : ((nom = o.displayName), (phone = e), (popupDiv.className = "popupLoading"), checkUserOnDatabase());
                        });
                });
        });
}
function checkUserOnDatabase() {
    let e = database.collection(pays).doc("Users").collection("List").doc(firebase.auth().currentUser.uid);
    e.get()
        .then(function (e) {
            e.exists
                ? (console.log("local save "),
                  localStorage.setItem("username", e.data().nom),
                  localStorage.setItem("userphone", e.data().phone),
                  localStorage.setItem("uid", e.data().uid),
                  localStorage.setItem("pays", e.data().pays),
                  null != e.data().lieux && localStorage.setItem("lieux", e.data().lieux),
                  (window.location.href = "/compte.html"))
                : (saveUserOnDatabase(), console.log("2"));
        })
        .catch(function (e) {
            (popupDiv.className = "popupLoadingClose"), console.log(e);
        });
}
function saveUserOnDatabase() {
    let e = database.collection(pays).doc("Users").collection("List").doc(firebase.auth().currentUser.uid);
    var o = { nom: nom, uid: firebase.auth().currentUser.uid, phone: phone, pays: pays, paysOrigin: pays, type: "Users", email: firebase.auth().currentUser.email };
    e.set(o).then(function () {
        console.log("Save User bien"),
            localStorage.setItem("username", nom),
            localStorage.setItem("userphone", phone),
            localStorage.setItem("pays", pays),
            localStorage.setItem("uid", firebase.auth().currentUser.uid),
            localStorage.setItem("lieux", null),
            (window.location.href = "/compte.html");
    });
}
function checkCart() {
    (cart = JSON.parse(localStorage.getItem("cart"))),
        null == cart || 0 == cart.cartProduct.length ? ((cart = { cartProduct: [] }), (count.style.display = "none")) : ((count.style.display = "inline"), (count.textContent = cart.cartProduct.length));
}
function showErrorDialog(e) {
    (errorMessage.textContent = e),
        (errorDialog.style.transform = "translateY(0%)"),
        setTimeout(() => {
            errorDialog.style.transform = "translateY(-100%)";
        }, 3e3);
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
const database = firebase.firestore();
firebase
    .firestore()
    .enablePersistence()
    .catch(function (e) {
        "failed-precondition" == e.code ? console.log("Multiple") : "unimplemented" == e.code && console.log("uniplemented");
    });
const auth = firebase.auth();
auth
    .setPersistence(firebase.auth.Auth.Persistence.LOCAL)
    .then(function () {
        console.log("Bon");
    })
    .catch(function (e) {
        console.log(e.message);
    }),
    firebase.auth().onAuthStateChanged(function (e) {
        e ? console.log(e) : console.log("non auth");
    }),
    (window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier("recaptcha-container")),
    recaptchaVerifier.render().then((e) => {
        window.recaptchaWidgetId = e;
    });
const errorDialog = document.querySelector(".error"),
    errorMessage = document.querySelector(".error h1"),
    btnCode = document.querySelector("#btnCode"),
    formCodeContainer = document.querySelector("#formCodeContainer"),
    labelNumber = document.querySelector("#formCodeContainer label"),
    h1 = document.querySelector("#connectionForm h1"),
    count = document.querySelector(".count"),
    input = document.querySelector("#formIndex"),
    formNom = document.querySelector("#formNom"),
    formIndex = document.querySelector("#formIndex"),
    formNumber = document.querySelector("#formNumber"),
    formCode = document.querySelector("#formCode"),
    btnConnection = document.querySelector("#btnConnection"),
    btnGmail = document.querySelector("#btnGmail"),
    popupDiv = document.querySelector(".popupLoadingClose");
var paysIndex,
    provider = new firebase.auth.GoogleAuthProvider();
let nom, index, phone;
var cart;
setOnClick(), checkCart(), "Togo" == pays ? ((input.value = "+228"), (paysIndex = "+228")) : "Benin" == pays ? ((input.value = "+229"), (paysIndex = "+229")) : "CoteDivoire" == pays && ((input.value = "+225"), (paysIndex = "+225"));
