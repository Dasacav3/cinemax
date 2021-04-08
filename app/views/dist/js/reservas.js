listarReservas();
function listarReservas(busqueda) {
	fetch("../../models/admin/listarReserva.php", {
		method: "POST",
		body: busqueda,
	})
		.then((response) => response.text())
		.then((response) => {
			reservas.innerHTML = response;
		});
}

function eliminarReserva(id) {
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
			fetch("../../models/admin/eliminarReserva.php", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
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

function Editar(id) {
	fetch("../../models/admin/actualizarReserva.php", {
		method: "POST",
		body: id,
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
	fetch("../../models/admin/editarReserva.php", {
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

search_input.addEventListener("keyup", () => {
	const valor = search_input.value;
	if (valor == "") {
		listarReservas();
	} else {
		listarReservas(valor);
	}
});

// Modals reservaciones

var pop_up_edit = document.getElementById("pop_up_edit");
var pop_up_wrap_edit = document.getElementById("form_edit");
var abrir_edit = document.getElementsByClassName("abrirPopup-edit");

function showPopup_edit() {
	pop_up_edit.classList.add("show");
	pop_up_wrap_edit.classList.add("show");
}

function abrir() {
	for (var i = 0; i < abrir_edit.length; i++) {
		abrir_edit[i].addEventListener("click", () => {
			showPopup_edit();
		});
	}
}

var cerrar_edit = document.getElementById("closePopup-edit");

cerrar_edit.addEventListener("click", () => {
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
});
