"use strict";
import { URL } from "./constantes.js";

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

	function addMovie() {
		let form = document.getElementById("form_add_movie");
		fetch(URL + "peliculas/add", {
			method: "POST",
			body: new FormData(form),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
				if (response == "ok") {
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
			});
	}

	getMovie();

	function getMovie() {
		let contenedor = document.getElementById("movies");
		fetch(URL + "peliculas/get", {
			method: "POST",
		})
			.then((response) => response.text())
			.then((response) => {
				contenedor.innerHTML = response;
			});
		setTimeout(() => {
			let btnDelete = document.getElementsByClassName("btnDelete");
			let btnEdit = document.getElementsByClassName("btnEdit");

			for (let i = 0; i < btnDelete.length; i++) {
				btnDelete[i].addEventListener("click", deleteMovie, false);
			}

			for (let i = 0; i < btnEdit.length; i++) {
				btnEdit[i].addEventListener("click", editMovie, false);
			}
		}, 1000);
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
				fetch(URL + "peliculas/delete", {
					method: "POST",
					body: idMovie[1],
				})
					.then((response) => response.text())
					.then((response) => {
						if (response == "ok") {
							Swal.fire("Eliminación", "La pelicula fue eliminada exitosamente", "success");
							getMovie();
						} else {
							Swal.fire("Error", "La pelicula no se pudó eliminar", "error");
							getMovie();
						}
					});
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
		fetch(URL + "peliculas/getEditData", {
			method: "POST",
			body: idMovie,
		})
			.then((response) => response.json())
			.then((response) => {
				console.log(response);
				idMovie1.value = response.id_pelicula;
				movieTitle1.value = response.titulo_pelicula;
				movieGender1.value = response.genero;
				añoPublicacion1.value = response.año_publicacion;
			});
		modal1.classList.add("show");
		wrap1.classList.add("show");
		modal1.style.zIndex = 100;
		wrap1.style.zIndex = 100;
	}

	function updateMovie() {
		let form = document.getElementById("form_edit_movie");
		fetch(URL + "peliculas/edit", {
			method: "POST",
			body: new FormData(form),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
				if (response == "ok") {
					Swal.fire("Actualización", "La pelicula fue editada exitosamente", "success");
					getMovie();
					closeModal();
					form.reset();
				} else {
					Swal.fire("Error", "Pelicula no actualizada", "error");
					form.reset();
				}
			});
	}
});
