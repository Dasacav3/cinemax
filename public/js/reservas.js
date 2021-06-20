"use strict";
import { URL } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {
	const pop_up_edit = document.getElementById("pop_up_edit");
	const pop_up_wrap_edit = document.getElementById("form_edit");

	let reporte_reserva_container = document.getElementById("reporte_reserva_container");
	let reporte_reserva = document.getElementById("reporte_reserva");
	let btn_reporte_reserva = document.getElementById("reporteReserva");
	btn_reporte_reserva.addEventListener("click", showPopup_add_reserva, true);
	let btnGenReserva = document.getElementById("generarReporteReserva");
	btnGenReserva.addEventListener("click", generarReporteReserva, false);

	function showPopup_add_reserva() {
		reporte_reserva.classList.add("show");
		reporte_reserva_container.classList.add("show");
	}

	let cerrar_add = document.getElementsByClassName("closePopup-add");

	for (let i = 0; i < cerrar_add.length; i++) {
		cerrar_add[i].addEventListener("click", () => {
			reporte_reserva.classList.remove("show");
			reporte_reserva_container.classList.remove("show");
			reporte_reserva.reset();
		});
	}

	function generarReporteReserva() {
		const fecha_inicio = document.getElementById("fecha_inicio_reserva");
		const fecha_final = document.getElementById("fecha_final_reserva");
		if (fecha_inicio.value == "") {
			Swal.fire({
				icon: "error",
				title: "Error",
				text: "La fecha inicio no puede estar vacia",
			});
		} else if (fecha_final.value == "") {
			Swal.fire({
				icon: "error",
				title: "Error",
				text: "La fecha final no puede estar vacia",
			});
		} else {
			fetch(URL + "reporte/generarReporte", {
				method: "POST",
				body: new FormData(reporte_reserva),
			})
				.then((res) => res.text())
				.then((response) => {
					console.log(response);
					reporte_reserva.reset();
					(window.location.href = URL + response), "_blank";
				});
		}
	}

	function DisplayList(items, wrapper, rows_per_page, page) {
		wrapper.innerHTML = "";
		page--;

		let start = rows_per_page * page;
		let end = start + rows_per_page;
		let paginatedItems = items.slice(start, end);

		var output = "";
		for (let i = 0; i < paginatedItems.length; i++) {
			var item = new Array();
			item[i] = paginatedItems[i];
			output += `
					<tr>
						<td> ${item[i].ID_RESERVA}  </td>
						<td> ${item[i].ID_PELICULA}  </td>
						<td> ${item[i].ID_CLIENTE}  </td>
						<td> ${item[i].NUMERO_SALA}  </td>
						<td> ${item[i].CODIGO_ASIENTO}  </td>
						<td> ${item[i].FECHA_RESERVACION}  </td>
						<td> ${item[i].HORA_RESERVACION}  </td>
						<td> ${item[i].ESTADO_RESERVACION}  </td>
						<td><button class='abrirPopup-edit btn-edit' type='button' id='btnDelete- ${item[i].ID_RESERVA} '><i class="fas fa-edit"></i></button>
                        <button class='btn-delete' type='button' id='btnEdit- ${item[i].ID_RESERVA} '><i class="fas fa-trash"></i></button>
                    </td>  
					</tr>`;
			wrapper.innerHTML = output;
		}
	}

	function paginationTable(list_items) {
		const list_element = document.getElementById("table_elements");
		const pagination_element = document.getElementById("pagination");

		let current_page = 1;
		let rows = 5;

		function SetupPaginations(items, wrapper, rows_per_page) {
			wrapper.innerHTML = "";

			let page_count = Math.ceil(items.length / rows_per_page);
			for (let i = 1; i <= page_count; i++) {
				let btn = PaginationButton(i, items);
				wrapper.appendChild(btn);
			}
		}

		function PaginationButton(page, items) {
			let button = document.createElement("button");
			button.innerText = page;

			if (current_page == page) button.classList.add("active");

			button.addEventListener("click", () => {
				current_page = page;
				DisplayList(items, list_element, rows, current_page);

				let current_btn = document.querySelector(".pagenumbers button.active");
				current_btn.classList.remove("active");

				button.classList.add("active");

				enableBtns();
			});

			return button;
		}

		DisplayList(list_items, list_element, rows, current_page);
		SetupPaginations(list_items, pagination_element, rows);
	}

	function enableBtns() {
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
	}

	listarReservas();
	function listarReservas(busqueda) {
		let req = new XMLHttpRequest();
		req.open("POST", URL + "reservas/listarReservas", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					// reservas.innerHTML = req.responseText;
					console.log(JSON.parse(req.responseText));
					paginationTable(JSON.parse(req.responseText));
				}
			}
		};
		req.send(busqueda);
		setTimeout(() => {
			enableBtns();
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
				let req = new XMLHttpRequest();
				req.open("POST", URL + "reservas/eliminarReserva", true);
				req.onreadystatechange = () => {
					if (req.readyState == 4) {
						if (req.status == 200) {
							console.log(req.responseText);
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
						}
					}
				};
				req.send(id[1]);
			}
		});
	}

	function Editar() {
		pop_up_edit.classList.add("show");
		pop_up_wrap_edit.classList.add("show");
		let idEdit = this.getAttribute("id");
		let idF = idEdit.split("-");
		console.log(idF[1]);
		let req = new XMLHttpRequest();
		req.open("POST", URL + "reservas/actualizarReserva2", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					console.log(JSON.parse(req.responseText));
					reserva1.value = JSON.parse(req.responseText).id_reserva;
					pelicula1.value = JSON.parse(req.responseText).id_pelicula;
					sala1.value = JSON.parse(req.responseText).numero_sala;
					asiento1.value = JSON.parse(req.responseText).codigo_asiento;
					fecha1.value = JSON.parse(req.responseText).fecha_reservacion;
					hora1.value = JSON.parse(req.responseText).hora_reservacion;
					estado1.value = JSON.parse(req.responseText).estado_reservacion;
				}
			}
		};
		req.send(idF[1]);
	}

	modificar.addEventListener("click", () => {
		let req = new XMLHttpRequest();
		req.open("POST", URL + "reservas/editarReserva2", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					if (req.responseText == "ok") {
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
				}
			}
		};
		req.send(new FormData(form_edit));
	});

	let search = document.getElementById("search_input");

	search.addEventListener("keyup", buscar, false);

	function buscar() {
		const valor = search_input.value;
		console.log(valor);
		if (valor == "") {
			listarReservas();
		} else {
			listarReservas(valor);
		}
	}
});
