const form = document.getElementById("form");
const mensaje = document.getElementById("message");

form.addEventListener("submit", (e) => {
	e.preventDefault();
	fetch("http://localhost/cinemax/login/loginUser", {
		body: new FormData(form),
		method: "POST",
	})
		.then((res) => res.text())
		.then((response) => {
			form.reset();
			mensaje.innerHTML = response;
			if (response.trim() == "<p class='success admin'>Ingreso exitoso</p>") {
				setTimeout(() => {
                    window.location.href = "http://localhost/cinemax/admin";
                }, 2000);
			}else if(response.trim() == "<p class='success cliente'>Ingreso exitoso</p>"){
				setTimeout(() => {
                    window.location.href = "http://localhost/cinemax/cliente";
                }, 2000);
			}
		});
});
