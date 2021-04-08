function startMobileSearch() {
    let e = document.querySelector("#editTextM").value;
    null == e || "" == e || ((window.location.href = "/recent.html?rechercher=" + e.normalize("NFD").replace(/[\u0300-\u036f]/g, "")), console.log("font"));
}
const editText = document.querySelector("#search-input"),
    emailInput = document.querySelector("#emailInput");
try {
    document.querySelector("#ic_search").addEventListener("click", function () {
        startMobileSearch();
    });
} catch (e) {}
document.querySelector("#btn-search").addEventListener("click", function () {
    let e = editText.value;
    null == e || "" == e || ((window.location.href = "/recent.html?rechercher=" + e.normalize("NFD").replace(/[\u0300-\u036f]/g, "")), console.log("font"));
});
const paysButton = document.querySelector("#paysButton"),
    paysDrop = document.querySelector(".paysDrop");
paysButton.addEventListener("click", function (e) {
    e.stopPropagation();
    let t = window.getComputedStyle(paysDrop);
    "none" == t.display
        ? ((paysDrop.style.display = "block"), (paysButton.style.backgroundColor = "#ededed"), (paysButton.style.borderRadius = "4px"), (userCountry = "Togo"))
        : ((paysDrop.style.display = "none"), (paysButton.style.backgroundColor = "#fff"));
}),
    editText.addEventListener("keyup", function (e) {
        if ("Enter" === e.key) {
            let e = editText.value;
            null == e || "" == e || ((window.location.href = "/recent.html?rechercher=" + e.normalize("NFD").replace(/[\u0300-\u036f]/g, "")), console.log("font"));
        }
    });
