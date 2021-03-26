listarReservas();
function listarReservas() {
	fetch("../../models/listarReserva.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			reservas.innerHTML = response;
		});
}

registrar.addEventListener("click", () => {
	fetch("../../models/añadirReserva.php", {
		method: "POST",
		body: new FormData(form_register),
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response == "ok") {
				Swal.fire({
					icon: "success",
					title: "Registrado",
					showConfirmButton: false,
					timer: 1500,
				});
				form_register.reset();
				listarReservas();
			}
		});
});

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
			fetch("../../models/eliminarReserva.php", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
					listarReservas();
					Swal.fire({
						icon: "success",
						title: "Eliminado",
						showConfirmButton: false,
						timer: 1500,
					});
				});
		}
	});
}

// function editarReserva(id) {
// 	fetch("../../models/actualizarReserva.php", {
// 		method: "POST",
// 		body: id,
// 	})
// 		.then((response) => response.text())
// 		.then((response) => {
// 			console.log(response);
// 			const id_reserva = response;
// 			modificar.addEventListener("click", () => {
// 				fetch("../../models/editarReserva.php", {
// 					method: "POST",
// 					data: id_reserva
// 				}).then((response) => response.json())
// 				.then((response) =>{
// 					console.log(response);
// 				})
// 				Swal.fire({
// 					icon: "success",
// 					title: "Modificado",
// 					showConfirmButton: false,
// 					timer: 1500,
// 				});
// 				form_edit.reset();
// 				listarReservas();
// 			});
// 		});
// }

function Editar(id) {
	fetch("../../models/actualizarReserva.php", {
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
		});
}


modificar.addEventListener("click", () => {
	fetch("../../models/editarReserva.php", {
		method: "POST",
		body: new FormData(form_edit),
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response == "ok") {
				Swal.fire({
					icon: "success",
					title: "Modificación",
					showConfirmButton: false,
					timer: 1500,
				});
				form_edit.reset();
				listarReservas();
			}
		});
});