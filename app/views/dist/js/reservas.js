function listarReservas() {
	fetch("../../models/reservas/listarReserva.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
		});
}

registrar.addEventListener("click", () => {
	fetch("../../models/reservas/añadirReserva.php", {
		method: "POST",
		body: new FormData(form_add_reserva),
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
				form_add_reserva.reset();
				var modalAdd = document.getElementById("#modal-editar-reserva");
				modalAdd.classList.add("modal");
			}
		});
});
