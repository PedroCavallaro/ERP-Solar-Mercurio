"use strict";
const info = document.querySelectorAll(".info"), sendInfo = document.querySelector("#sendInfo");
//cep
info[5].addEventListener('blur', async () => {
    try {
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
sendInfo?.addEventListener('click', (e) => {
    let test = info.forEach((e) => {
        if (e.value === " ") {
            return false;
        }
        return true;
    });
    if (!test) {
        e.preventDefault();
    }
});
