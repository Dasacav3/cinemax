export const URL = "http://localhost/cinemax/";

export function changeCursor() {
	const body = document.getElementById("body");
	let cursor = document.createElement("div");
	cursor.classList.add("cursor");
	body.style.cursor = "none";
	body.appendChild(cursor);
	document.addEventListener("mousemove", (e) => {
		cursor.setAttribute("style", "top: " + (e.pageY - 10) + "px; left: " + (e.pageX - 10) + "px");
	});
}

export function changeBackground() {
	const body = document.getElementById("body");
	const section = document.getElementById("background_secret");
	const section_text = document.getElementById("text-out");
	const container = document.getElementById("contenido_page");
	body.style.overflow = "hidden";
	container.classList.add("hidden");
	section.classList.add("show");
	section_text.classList.add("show");
}
