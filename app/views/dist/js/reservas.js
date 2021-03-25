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
			}else{
				Swal.fire({
					icon: "success",
					title: "Modificado",
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
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("../../models/eliminarReserva.php", {
                method: "POST",
                body: id
            }).then(response => response.text()).then(response => {
					listarReservas();
                   Swal.fire({
                       icon: 'success',
                       title: 'Eliminado',
                       showConfirmButton: false,
                       timer: 1500
                   }) 
            })  
        }           
    })
}

function editarReserva(id) {
	fetch("../../models/editarReserva.php", {
		method: "POST",
		body: id,
	})
		.then((response) => response.json())
		.then((response) => {
			pelicula.value = response.id_reserva;
			sala.value = response.numero_sala;
			asiento.value = response.codigo_asiento;
			fecha.value = response.fecha_reservacion;
			hora.value = response.hora_reservacion;
			registrar.value = "Actualizar";
		});
}
