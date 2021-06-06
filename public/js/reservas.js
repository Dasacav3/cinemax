"use strict";
import { URL } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {
	const pop_up_edit = document.getElementById("pop_up_edit");
	const pop_up_wrap_edit = document.getElementById("form_edit");

	listarReservas();
	function listarReservas(busqueda) {
		fetch(URL + "reservas/listarReservas", {
			method: "POST",
			body: busqueda,
		})
			.then((response) => response.text())
			.then((response) => {
				reservas.innerHTML = response;
			});
		setTimeout(() => {
			const btnDelete = document.getElementsByClassName("btn-delete");
			const btnEdit = document.getElementsByClassName("btn-edit");

			for (var i = 0; i < btnEdit.length; i++) {
				btnEdit[i].addEventListener("click", Editar, false);
			}

			for (var i = 0; i < btnDelete.length; i++) {
				btnDelete[i].addEventListener("click", eliminarReserva, false);
			}
			const cerrar_edit = document.getElementById("closePopup-edit");

			cerrar_edit.addEventListener("click", () => {
				pop_up_edit.classList.remove("show");
				pop_up_wrap_edit.classList.remove("show");
			});
		}, 1000);
	}

	function eliminarReserva() {
		let idLarge = this.getAttribute("id");
		let id = idLarge.split("-");
		Swal.fire({
			title: "Esta seguro de eliminar?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Si!",
			cancelButtonText: "NO",
		}).then((result) => {
			if (result.isConfirmed) {
				fetch(URL + "reservas/eliminarReserva", {
					method: "POST",
					body: id[1],
				})
					.then((response) => response.text())
					.then((response) => {
						console.log(response);
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
							title: "Reservación eliminada",
						});
						listarReservas();
					});
			}
		});
	}

	function Editar() {
		pop_up_edit.classList.add("show");
		pop_up_wrap_edit.classList.add("show");
		let idEdit = this.getAttribute("id");
		let idF = idEdit.split("-");
		console.log(idF[1]);
		fetch(URL + "reservas/actualizarReserva2", {
			method: "POST",
			body: idF[1],
		})
			.then((response) => response.json())
			.then((response) => {
				console.log(response);
				reserva1.value = response.id_reserva;
				pelicula1.value = response.id_pelicula;
				sala1.value = response.numero_sala;
				asiento1.value = response.codigo_asiento;
				fecha1.value = response.fecha_reservacion;
				hora1.value = response.hora_reservacion;
				estado1.value = response.estado_reservacion;
			});
	}

	modificar.addEventListener("click", () => {
		fetch(URL + "reservas/editarReserva2", {
			method: "POST",
			body: new FormData(form_edit),
		})
			.then((response) => response.text())
			.then((response) => {
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
						title: "Reserva modificada correctamente",
					});
					form_edit.reset();
					pop_up_edit.classList.remove("show");
					pop_up_wrap_edit.classList.remove("show");
					listarReservas();
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
						title: "La reserva no fue modificada",
					});
				}
			});
	});

	let search = document.getElementById("search_input");

	search.addEventListener("keyup", buscar, false);

	function buscar() {
		const valor = search_input.value;
		if (valor == "") {
			listarReservas();
		} else {
			listarReservas(valor);
		}
	}
});
