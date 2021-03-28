listarReservas();
function listarReservas(busqueda) {
	fetch("../models/listarReserva.php", {
		method: "POST",
		body: busqueda
	})
		.then((response) => response.text())
		.then((response) => {
			reservas.innerHTML = response;
		});
}

// Reservas

const formReserva = document.getElementById("form_register");
const pelicula = document.getElementById("pelicula");
const sala = document.getElementById("sala");
const asiento = document.getElementById("asiento");
const fecha = document.getElementById("fecha");
const hora = document.getElementById("hora");
const error2 = document.getElementById("alertas");


formReserva.addEventListener("submit", (e) =>{
    e.preventDefault();

    let alertas = "";
    let registrar_1 = false;
    error2.innerHTML = "";

    if(!isNaN(pelicula)){
        alertas += `<p>El numero de pelicula es invalido <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(!isNaN(sala)){
        alertas  += `<p>El numero de pelicula es invalido <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(registrar_1){
        error2.innerHTML = alertas 
    }else{
        error2.innerHTML = "";
        e.currentTarget.submit();
    }

})

registrar.addEventListener("click", () => {
	fetch("../models/añadirReserva.php", {
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
			fetch("../models/eliminarReserva.php", {
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

function Editar(id) {
	fetch("../models/actualizarReserva.php", {
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
			estado1.value = response.estado_reservacion;
		});
}


modificar.addEventListener("click", () => {
	fetch("../models/editarReserva.php", {
		method: "POST",
		body: new FormData(form_edit),
	})
		.then((response) => response.text())
		.then((response) => {
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

search_input.addEventListener("keyup", () =>{
	const valor = search_input.value;
	if(valor == ""){
		listarReservas();
	}else{
		listarReservas(valor)
	}
});



// Modals reservaciones
var pop_up_add = document.getElementById("pop_up_add");
var pop_up_wrap_add = document.getElementById("form_register");

var pop_up_edit = document.getElementById("pop_up_edit");
var pop_up_wrap_edit = document.getElementById("form_edit");

var abrir_add = document.getElementById('abrirPopup-add');
var abrir_edit = document.getElementsByClassName('abrirPopup-edit');

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


function abrir(){
	for (var i = 0; i < abrir_edit.length; i++) {
		abrir_edit[i].addEventListener("click", () => {
			showPopup_edit();
		});
	}
}

var cerrar_add = document.getElementById("closePopup-add");
var cerrar_edit = document.getElementById("closePopup-edit");


cerrar_add.addEventListener('click', () =>{
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
})

cerrar_edit.addEventListener('click', () =>{
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
})