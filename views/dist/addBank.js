"use strict";
const infoBank = document.querySelectorAll(".info"),
  formBank = document.querySelector("#formBank");
window.addEventListener("load", () => {
  bankError();
});
//@ts-ignore
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
});
formBank?.addEventListener("submit", (e) => {
  infoBank.forEach((ele) => {
    if (ele.value === "") {
      e.preventDefault();
      ele.style.animation = "shake 1s";
      ele.style.borderBottomColor = "red";
      Toast.fire({
        icon: "error",
        title: "Preencha os campos necessários",
      });
    } else {
      ele.style.borderBottomColor = "black";
    }
  });
});
function bankError() {
  const Url = new URL(window.location.href);
  const err = Url.searchParams.get("err");
  if (err) {
    Toast.fire({
      icon: "error",
      title: "Erro no Cadastro.",
    });
  }
}
