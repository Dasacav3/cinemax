import { URL } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {
	var pop_up_add = document.getElementById("pop_up_add");
	var pop_up_wrap_add = document.getElementById("form_register");

	listarReservas();
	function listarReservas(busqueda) {
		fetch(URL + "reservas/listarReservas", {
			method: "POST",
			//body: busqueda,
		})
			.then((response) => response.text())
			.then((response) => {
				reservas.innerHTML = response;
				let btnDelete = document.getElementsByClassName("btn-delete");

				for (let i = 0; i < btnDelete.length; i++) {
					btnDelete[i].addEventListener("click", cancelarReserva, false);
				}
			});
	}

	registrar.addEventListener("click", () => {
		if (fecha.value == "") {
			Swal.fire({
				title: "Error",
				text: "La fecha de reserva no pude estar vacia",
				icon: "error",
			});
		} else if (pelicula.value == "") {
			Swal.fire({
				title: "Error",
				text: "Debes elegir una pelicula",
				icon: "error",
			});
		} else if (hora.value < "08:00" || hora.value > "20:00" || hora.value == "") {
			Swal.fire({
				title: "Error",
				text: "La hora de reservacion debe estar entre 8:00 am y 8:00 pm",
				icon: "error",
			});
		} else if (sala.value == "" || sala.value <= 0) {
			Swal.fire({
				title: "Error",
				text: "El numero de mesa no puede estar vacio",
				icon: "error",
			});
		} else if (asiento.value == "" || asiento.value <= 0 || asiento.value > 100) {
			Swal.fire({
				title: "Error",
				text: "El numero de asientos no puede estar vacio ni ser mayor a 100 por sala",
				icon: "error",
			});
		} else {
			fetch(URL + "reservas/añadirReserva", {
				method: "POST",
				body: new FormData(form_register),
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
							title: "Reservacion registrada exitosamente",
						});
						form_register.reset();
						listarReservas();
						pop_up_add.classList.remove("show");
						pop_up_wrap_add.classList.remove("show");
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
							title: "Reserva no registrada, vuelve a intentarlo",
						});
						form_register.reset();
					}
				});
		}
	});

	function cancelarReserva() {
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
				fetch(URL + "reservas/cancelarReserva", {
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

	search_input.addEventListener("keyup", () => {
		const valor = search_input.value;
		if (valor == "") {
			listarReservas();
		} else {
			listarReservas(valor);
		}
	});

	function showPopup_add() {
		pop_up_add.classList.add("show");
		pop_up_wrap_add.classList.add("show");
	}

	var abrir_add = document.getElementById("abrirPopup-add");

	abrir_add.addEventListener("click", () => {
		showPopup_add();
	});

	var cerrar_add = document.getElementById("closePopup-add");

	cerrar_add.addEventListener("click", () => {
		pop_up_add.classList.remove("show");
		pop_up_wrap_add.classList.remove("show");
	});
});
