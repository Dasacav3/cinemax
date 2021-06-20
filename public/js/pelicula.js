"use strict";
import { URL, changeCursor, changeBackground } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {
	let modal = document.getElementById("form_add_movie");
	let wrap = document.getElementById("form_add_movie_wrap");

	let modal1 = document.getElementById("form_edit_movie");
	let wrap1 = document.getElementById("form_edit_movie_wrap");

	let btnOpen = document.getElementById("addMovie");
	btnOpen.addEventListener("click", addMovieBtn, false);

	let btnClose = document.getElementsByClassName("closePopup");
	for (let i = 0; i < btnClose.length; i++) {
		btnClose[i].addEventListener("click", closeModal, false);
	}

	let btnAdd = document.getElementById("sendMovie");
	btnAdd.addEventListener("click", addMovie, false);

	let btnUpdate = document.getElementById("editMovie");
	btnUpdate.addEventListener("click", updateMovie, false);

	function addMovieBtn() {
		modal.classList.add("show");
		wrap.classList.add("show");
		modal.style.zIndex = 100;
		wrap.style.zIndex = 100;
	}

	document.addEventListener("keypress", (e) => {
		if (e.keyCode == 32) {
			let body = document.getElementById("body");
			let section = document.getElementById("background_secret");
			let section_text = document.getElementById("text-out");
			let container = document.getElementById("contenido_page");
			body.style.overflow = "auto";
			container.classList.remove("hidden");
			section.classList.remove("show");
			section_text.classList.remove("show");
		}
	});

	let cursor;

	function addMovie() {
		let form = document.getElementById("form_add_movie");
		let req = new XMLHttpRequest();
		req.open("POST", URL + "peliculas/add", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200 && req.responseText == "ok") {
					const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener("mouseenter", Swal.stopTimer);
							toast.addEventListener("mouseleave", Swal.resumeTimer);
						},
					});

					Toast.fire({
						icon: "success",
						title: "Pelicula registrada exitosamente",
					});
					getMovie();
					closeModal();
					form.reset();
				} else {
					const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener("mouseenter", Swal.stopTimer);
							toast.addEventListener("mouseleave", Swal.resumeTimer);
						},
					});

					Toast.fire({
						icon: "error",
						title: "Pelicula no registrada, vuelve a intentarlo",
					});
					form.reset();
				}
			}
		};
		req.send(new FormData(form));
	}

	getMovie();

	function getMovie() {
		let contenedor = document.getElementById("movies");
		let req = new XMLHttpRequest();
		req.open("POST", URL + "peliculas/get", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					contenedor.innerHTML = req.responseText;
					console.log("XML REQUEST");
					setTimeout(() => {
						let btnDelete = document.getElementsByClassName("btnDelete");
						let btnEdit = document.getElementsByClassName("btnEdit");

						for (let i = 0; i < btnDelete.length; i++) {
							btnDelete[i].addEventListener("click", deleteMovie, false);
						}

						for (let i = 0; i < btnEdit.length; i++) {
							btnEdit[i].addEventListener("click", editMovie, false);
						}

						let changeC = document.getElementById("btn_cursor");
						changeC.addEventListener("click", changeCursor, false);
						let changeB = document.getElementById("btn_background");
						changeB.addEventListener("click", changeBackground, false);

						cursor = document.querySelector(".cursor");
					}, 1000);
				}
			}
		};
		req.send();
	}

	function closeModal() {
		modal.classList.remove("show");
		wrap.classList.remove("show");
		modal1.classList.remove("show");
		wrap1.classList.remove("show");
	}

	function deleteMovie() {
		let id = this.getAttribute("id");
		let idMovie = id.split("-");
		Swal.fire({
			title: "¿Estas seguro?",
			text: "Esta acción no se puede deshacer",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Aceptar",
			cancelButtonText: "Cancelar",
		}).then((result) => {
			if (result.isConfirmed) {
				let req = new XMLHttpRequest();
				req.open("POST", URL + "peliculas/delete", true);
				req.onreadystatechange = () => {
					if (req.readyState == 4) {
						if (req.status == 200) {
							Swal.fire("Eliminación", "La pelicula fue eliminada exitosamente", "success");
							getMovie();
						}
					} else {
						Swal.fire("Error", "La pelicula no se pudó eliminar", "error");
						getMovie();
					}
				};
				req.send(idMovie[1]);
			}
		});
	}

	function editMovie() {
		let id = this.getAttribute("id");
		let sep = id.split("-");
		let idMovie = sep[1];
		let idMovie1 = document.getElementById("idMovie1");
		let movieTitle1 = document.getElementById("movieTitle1");
		let movieGender1 = document.getElementById("movieGender1");
		let añoPublicacion1 = document.getElementById("añoPublicacion1");
		let req = new XMLHttpRequest();
		req.open("POST", URL + "peliculas/getEditData", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					idMovie1.value = JSON.parse(req.responseText).id_pelicula;
					movieTitle1.value = JSON.parse(req.responseText).titulo_pelicula;
					movieGender1.value = JSON.parse(req.responseText).genero;
					añoPublicacion1.value = JSON.parse(req.responseText).año_publicacion;
				}
			}
		};
		req.send(idMovie);
		modal1.classList.add("show");
		wrap1.classList.add("show");
		modal1.style.zIndex = 100;
		wrap1.style.zIndex = 100;
	}

	function updateMovie() {
		let form = document.getElementById("form_edit_movie");
		let req = new XMLHttpRequest();
		req.open("POST", URL + "peliculas/edit", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200 && req.responseText == "ok") {
					Swal.fire("Actualización", "La pelicula fue editada exitosamente", "success");
					getMovie();
					closeModal();
					form.reset();
				} else {
					Swal.fire("Error", "Pelicula no actualizada", "error");
					form.reset();
				}
			}
		};
		req.send(new FormData(form));
	}
});
