listarUsers();
function listarUsers(busqueda) {
	fetch("../models/listarUser.php", {
		method: "POST",
		body: busqueda
	})
		.then((response) => response.text())
		.then((response) => {
			users.innerHTML = response;
		});
}

function eliminarUser(id) {
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
			fetch("../models/eliminarUser.php", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
					if(response == "ok"){
						console.log(response);
						listarUsers();
						Swal.fire({
							icon: "success",
							title: "Eliminado",
							showConfirmButton: false,
							timer: 1500,
						});
					}else{
						listarUsers();
						Swal.fire({
							icon: "error",
							title: "No se pudo eliminar",
							text: "Este usuario no se puede eliminar debido a que tiene reservas asociadas, eliminelas primero",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				});
		}
	});
}

function Editar(id) {
	fetch("../models/actualizarUser.php", {
		method: "POST",
		body: id,
	})
		.then((response) => response.json())
		.then((response) => {
			id_user.value = response.ID_USUARIO;
			user.value = response.NOMBRE_USUARIO;
			pass.value = response.CLAVE_USUARIO;
			tipo.value = response.TIPO_USUARIO;
		});
}


modificar.addEventListener("click", () => {
	fetch("../models/editarUser.php", {
		method: "POST",
		body: new FormData(form_edit)
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
				listarUsers();
			}
		});
});


search_input.addEventListener("keyup", () =>{
	const valor = search_input.value;
	if(valor == ""){
		listarUsers();
	}else{
		listarUsers(valor)
	}
});



// Modals reservaciones

var pop_up_edit = document.getElementById("pop_up_edit");
var pop_up_wrap_edit = document.getElementById("form_edit");

var abrir_edit = document.getElementsByClassName('abrirPopup-edit');

function showPopup_edit() {
	pop_up_edit.classList.add("show");
	pop_up_wrap_edit.classList.add("show");
}

function abrir(){
	for (var i = 0; i < abrir_edit.length; i++) {
		abrir_edit[i].addEventListener("click", () => {
			showPopup_edit();
		});
	}
}

var cerrar_edit = document.getElementById("closePopup-edit");


cerrar_edit.addEventListener('click', () =>{
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
})