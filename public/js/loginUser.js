import { URL } from "./constantes.js";

const form = document.getElementById("form");
const mensaje = document.getElementById("message");

form.addEventListener("submit", (e) => {
	e.preventDefault();
	let req = new XMLHttpRequest();
	req.open("POST", `${URL}login/loginUser`, true);
	req.onreadystatechange = () => {
		if (req.readyState == 4) {
			if (req.status == 200) {
				form.reset();
				mensaje.innerHTML = req.responseText;
				if (req.responseText.trim() == "<p class='success admin'>Ingreso exitoso</p>") {
					setTimeout(() => {
						window.location.href = `${URL}admin`;
					}, 2000);
				} else if (req.responseText.trim() == "<p class='success cliente'>Ingreso exitoso</p>") {
					setTimeout(() => {
						window.location.href = `${URL}cliente`;
					}, 2000);
				}
			}
		}
	};
	req.send(new FormData(form));
});
