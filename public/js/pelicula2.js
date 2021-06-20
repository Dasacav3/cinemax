"use strict";
import { URL } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {
	function getMovie() {
		let contenedor = document.getElementById("movies");
		let req = new XMLHttpRequest();
		req.open("POST", URL + "peliculas/get", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					console.log("XML REQUEST");
					contenedor.innerHTML = req.responseText;
				}
			}
		};
		req.send();
	}

	getMovie();
});
