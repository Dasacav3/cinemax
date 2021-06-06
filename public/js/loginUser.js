import {URL} from "./constantes.js"; 

const form = document.getElementById("form");
const mensaje = document.getElementById("message");

form.addEventListener("submit", (e) => {
	e.preventDefault();
	fetch(`${URL}login/loginUser`, {
		body: new FormData(form),
		method: "POST",
	})
		.then((res) => res.text())
		.then((response) => {
			form.reset();
			mensaje.innerHTML = response;
			if (response.trim() == "<p class='success admin'>Ingreso exitoso</p>") {
				setTimeout(() => {
                    window.location.href = `${URL}admin`;
                }, 2000);
			}else if(response.trim() == "<p class='success cliente'>Ingreso exitoso</p>"){
				setTimeout(() => {
                    window.location.href = `${URL}cliente`;
                }, 2000);
			}
		});
});
