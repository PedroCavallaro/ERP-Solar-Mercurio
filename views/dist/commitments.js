"use strict";
const infoCommitment = document.querySelectorAll(".info"), formCommitment = document.querySelector("#formCommitment");
console.log("teste");
//@ts-ignore
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
});
formCommitment?.addEventListener("submit", (e) => {
    infoCommitment.forEach((ele) => {
        if (ele.value === "") {
            e.preventDefault();
            ele.style.animation = "shake 1s";
            ele.style.borderBottomColor = "red";
            Toast.fire({
                icon: 'error',
                title: 'Preencha os campos necessários'
            });
        }
    });
});
