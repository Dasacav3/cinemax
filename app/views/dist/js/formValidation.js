
// Registro

const formulario = document.getElementById("form_register");
const nombre = document.getElementById("nombres");
const apellido = document.getElementById("apellidos");
const edad = document.getElementById("edad");
const cel = document.getElementById("cel");
const email = document.getElementById("correo");
const pass = document.getElementById("pass");
const pass2 = document.getElementById("pass2");
const error = document.getElementById("warnings");

formulario.addEventListener("submit", (e) => {
    e.preventDefault();
    let warnings = "";
    let registrar = false;
    error.innerHTML = "";

    if(!expresiones.nombre.test(nombre.value)){
        warnings += `<p>El nombre es invalido <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(!expresiones.nombre.test(apellido.value)){
        warnings+= `<p>El apellido es invalido <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(!edad > 18){
        warnings+= `<p>La edad es invalida <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(!expresiones.telefono.test(cel.value)){
        warnings+= `<p>El celular es invalido <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(!expresiones.correo.test(email.value)){
        warnings+= `<p>El email es invalido <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(!expresiones.password.test(pass.value)){
        warnings+= `<p>La contraseña es invalida <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(pass.value != pass2.value){
        warnings+= `<p>Las contraseñas no coinciden <i class="fas fa-times-circle"></i><p/>`;
        registrar = true;
    }

    if(registrar){
        error.innerHTML = warnings
    }else{
        error.innerHTML = "";
        e.currentTarget.submit();
    }
});

