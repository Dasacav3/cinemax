"use strict";
import { URL } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {

	function getMovie() {
		let contenedor = document.getElementById("movies");
		fetch(URL + "peliculas/get", {
			method: "POST",
		})
			.then((response) => response.text())
			.then((response) => {
				contenedor.innerHTML = response;
			});
	}

    getMovie();
});
