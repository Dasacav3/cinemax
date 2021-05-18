listarReservas();
function listarReservas(busqueda) {
	fetch("http://localhost/cinemax/reservas/listarReservas", {
		method: "POST",
		//body: busqueda,
	})
		.then((response) => response.text())
		.then((response) => {
			reservas.innerHTML = response;
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
		fetch("http://localhost/cinemax/reservas/añadirReserva", {
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

function Editar(id) {
	fetch("http://localhost/cinemax/reservas/actualizarReserva", {
		method: "POST",
		body: id,
	})
		.then((response) => response.json())
		.then((response) => {
			reserva1.value = response.id_reserva;
			pelicula1.value = response.id_pelicula;
			sala1.value = response.numero_sala;
			asiento1.value = response.codigo_asiento;
			fecha1.value = response.fecha_reservacion;
			hora1.value = response.hora_reservacion;
		});
}

modificar.addEventListener("click", () => {
	if (fecha1.value == "") {
		Swal.fire({
			title: "Error",
			text: "La fecha de reserva no pude estar vacia",
			icon: "error",
		});
	} else if (pelicula1.value == "") {
		Swal.fire({
			title: "Error",
			text: "Debes elegir una pelicula",
			icon: "error",
		});
	} else if (hora1.value < "08:00:00" || hora1.value > "20:00:00" || hora1.value == "") {
		Swal.fire({
			title: "Error",
			text: "La hora de reservacion debe estar entre 8:00 am y 8:00 pm",
			icon: "error",
		});
	} else if (sala1.value <= 0) {
		Swal.fire({
			title: "Error",
			text: "El numero de sala no puede estar vacio",
			icon: "error",
		});
	} else if (asiento1.value == "" || asiento1.value <= 0 || asiento1.value > 100) {
		Swal.fire({
			title: "Error",
			text: "El numero de asientos no puede estar vacio ni ser mayor a 100 por sala",
			icon: "error",
		});
	} else{
		fetch("http://localhost/cinemax/reservas/editarReserva", {
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
						title: "Reserva editada exitosamente",
					});
					form_edit.reset();
					listarReservas();
					pop_up_edit.classList.remove("show");
					pop_up_wrap_edit.classList.remove("show");
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
						title: "La edición de la reservacion no fue posible",
					});
				}
			});
	}
});

search_input.addEventListener("keyup", () => {
	const valor = search_input.value;
	if (valor == "") {
		listarReservas();
	} else {
		listarReservas(valor);
	}
});

// Modals reservaciones
var pop_up_add = document.getElementById("pop_up_add");
var pop_up_wrap_add = document.getElementById("form_register");

var pop_up_edit = document.getElementById("pop_up_edit");
var pop_up_wrap_edit = document.getElementById("form_edit");

var abrir_add = document.getElementById("abrirPopup-add");
var abrir_edit = document.getElementsByClassName("abrirPopup-edit");

function showPopup_add() {
	pop_up_add.classList.add("show");
	pop_up_wrap_add.classList.add("show");
}

function showPopup_edit() {
	pop_up_edit.classList.add("show");
	pop_up_wrap_edit.classList.add("show");
}

abrir_add.addEventListener("click", () => {
	showPopup_add();
});

function abrir() {
	for (var i = 0; i < abrir_edit.length; i++) {
		abrir_edit[i].addEventListener("click", () => {
			showPopup_edit();
		});
	}
}

var cerrar_add = document.getElementById("closePopup-add");
var cerrar_edit = document.getElementById("closePopup-edit");

cerrar_add.addEventListener("click", () => {
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
});

cerrar_edit.addEventListener("click", () => {
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
});
