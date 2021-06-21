import { URL } from "./constantes.js";

window.addEventListener("DOMContentLoaded", () => {
	var pop_up_add = document.getElementById("pop_up_add");
	var pop_up_wrap_add = document.getElementById("form_register");

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
						<td> ${item[i].NUMERO_SALA}  </td>
						<td> ${item[i].CODIGO_ASIENTO}  </td>
						<td> ${item[i].FECHA_RESERVACION}  </td>
						<td> ${item[i].HORA_RESERVACION}  </td>
						<td> ${item[i].ESTADO_RESERVACION}  </td>
						<td>`;
					if (item[i].ESTADO_RESERVACION == "Activa") {
						output +=	`<button class='btn-delete' type='button' id='btnEdit- ${item[i].ID_RESERVA} '><i class="fas fa-trash"></i></button>
						</td> `;
					}
					`</tr>`;

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
		let btnDelete = document.getElementsByClassName("btn-delete");

		for (let i = 0; i < btnDelete.length; i++) {
			btnDelete[i].addEventListener("click", cancelarReserva, false);
		}
	}

	listarReservas();
	function listarReservas(busqueda) {
		let req = new XMLHttpRequest();
		req.open("POST", URL + "reservas/listarReservas", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					// reservas.innerHTML = req.responseText;
					paginationTable(JSON.parse(req.responseText));
					enableBtns();
				}
			}
		};
		req.send(busqueda);
	}

	listarPeliculas();
	function listarPeliculas() {
		let req = new XMLHttpRequest();
		req.open("POST", URL + "reservas/getPelicula", true);
		req.onreadystatechange = () => {
			if (req.readyState == 4) {
				if (req.status == 200) {
					pelicula.innerHTML = req.responseText;
				}
			}
		};
		req.send();
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
			let req = new XMLHttpRequest();
			req.open("POST", URL + "reservas/añadirReserva", true);
			req.onreadystatechange = () => {
				if (req.readyState == 4) {
					if (req.status == 200) {
						console.log(req.responseText);
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
					}
				}
			};
			req.send(new FormData(form_register));
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
				let req = new XMLHttpRequest();
				req.open("POST", URL + "reservas/cancelarReserva", true);
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
								title: "Reservación cancelada",
							});
							listarReservas();
						}
					}
				};
				req.send(id[1]);
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
