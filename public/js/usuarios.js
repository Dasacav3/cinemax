"use strict";
import { URL } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {
	const pop_up_edit = document.getElementById("pop_up_edit");
	const pop_up_wrap_edit = document.getElementById("form_edit");

	listarUsers();
	function listarUsers(busqueda) {
		fetch(URL + "usuarios/listarUsers", {
			method: "POST",
			body: busqueda,
		})
			.then((response) => response.text())
			.then((response) => {
				users.innerHTML = response;
			});

		setTimeout(() => {
			let btnEdit = document.getElementsByClassName("btn-edit");
			let btnDelete = document.getElementsByClassName("btn-delete");

			for (var i = 0; i < btnEdit.length; i++) {
				btnEdit[i].addEventListener("click", Editar, false);
			}

			for (var i = 0; i < btnDelete.length; i++) {
				btnDelete[i].addEventListener("click", eliminarUser, false);
			}

			var cerrar_edit = document.getElementById("closePopup-edit");

			cerrar_edit.addEventListener("click", () => {
				pop_up_edit.classList.remove("show");
				pop_up_wrap_edit.classList.remove("show");
			});
		}, 1000);
	}

	function eliminarUser() {
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
				fetch(URL + "usuarios/deleteUser", {
					method: "POST",
					body: id[1],
				})
					.then((response) => response.text())
					.then((response) => {
						console.log(response);
						if (response == "ok") {
							listarUsers();
							Swal.fire({
								icon: "success",
								title: "Eliminado",
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
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

	function Editar() {
		let idLarge = this.getAttribute("id");
		let id = idLarge.split("-");
		pop_up_edit.classList.add("show");
		pop_up_wrap_edit.classList.add("show");
		fetch(URL + "usuarios/actualizarUser", {
			method: "POST",
			body: id[1],
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
		fetch(URL + "usuarios/editUser", {
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
					listarUsers();
				}
			});
	});

	search_input.addEventListener("keyup", () => {
		const valor = search_input.value;
		if (valor == "") {
			listarUsers();
		} else {
			listarUsers(valor);
		}
	});
});
