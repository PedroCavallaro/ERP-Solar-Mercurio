"use strict";
const info = document.querySelectorAll(".info"), sendInfo = document.querySelector("#sendInfo"), formSupplier = document.querySelector("#formSupplier");
//cep
//@ts-ignore
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
});
info[5].addEventListener('blur', async () => {
    try {
        console.log(formSupplier);
        const response = await fetch(`https://viacep.com.br/ws/${info[5].value}/json/`)
            .then((res) => res.json());
        for (const key in response) {
            if (document.getElementById(`${key}`)) {
                let fields = document.getElementById(`${key}`);
                fields.value = response[key];
            }
        }
    }
    catch {
    }
});
formSupplier?.addEventListener('submit', (e) => {
    info.forEach((ele) => {
        if (ele.value === "") {
            e.preventDefault();
            console.log(ele);
            ele.style.animation = "shake 1s";
            ele.style.borderBottomColor = "red";
            Toast.fire({
                icon: 'error',
                title: 'Preencha os campos necessários'
            });
        }
    });
});
