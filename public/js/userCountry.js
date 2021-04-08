var pays = "Togo";
$(document).ready(function () {
    "Togo" == pays
        ? ((document.querySelector("#paysIcone").src = "/image/ic_togo.jpg"), (document.querySelector("#paysIcone").style.width = "20px"), (document.querySelector("#paysIcone").style.height = "14px"))
        : "Benin" == pays
        ? ((document.querySelector("#paysIcone").src = "/image/ic_benin.jpg"), (document.querySelector("#paysIcone").style.width = "20px"), (document.querySelector("#paysIcone").style.height = "14px"))
        : "CoteDivoire" == pays && ((document.querySelector("#paysIcone").src = "/image/ic_cote.png"), (document.querySelector("#paysIcone").style.width = "20px"), (document.querySelector("#paysIcone").style.height = "14px"));
});
try {
    "Togo" == pays
        ? (document.querySelector("#paysButtonM img").src = "../image/ic_togo.jpg")
        : "Benin" == pays
        ? (document.querySelector("#paysButtonM img").src = "../image/ic_benin.jpg")
        : "CoteDivoire" == pays && (document.querySelector("#paysButtonM img").src = "../image/ic_cote.png");
} catch (e) {}
