function changeLeague(value) {
    if (value !== 'NValid') {
        document.querySelector('#Instituciones option[value="NValid"]').style.display = 'none';
    }
    if (value !== 'NValid') {
        $('#' + value).show();
    }
    document.querySelectorAll('.Instituciones').forEach(section => section.style.display = 'none');
    if (value !== 'NValid') {
        document.getElementById(value).style.display = 'block';
    }
}

function validateForm(event) {
    let valid = true;

    // Limpiar mensajes de error previos
    document.querySelectorAll('.error2').forEach(e => e.textContent = '');

    const nombre = document.forms["registro"]["uname"].value;
    const titulo = document.forms["registro"]["titulo"].value;
    const especialidad = document.forms["registro"]["especialidad"].value;
    const correo = document.forms["registro"]["correo"].value;
    const institucion = document.forms["registro"]["Instituciones"].value;
    const password = document.forms["registro"]["password"].value;
    const repeatPassword = document.forms["registro"]["repeatPassword"].value;
    const documento = document.forms["registro"]["documento"].value;

    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;

    if (!nombre || !titulo || !especialidad || !correo || !password || !repeatPassword || !documento) {
        document.getElementById('generalError').textContent = "Todos los campos deben estar completos.";
        valid = false;
    }

    if (!passwordRegex.test(password)) {
        document.getElementById('passwordError').textContent = "La contraseña debe tener al menos 6 caracteres, incluyendo al menos un número y un símbolo especial.";
        valid = false;
    }

    if (password !== repeatPassword) {
        document.getElementById('repeatPasswordError').textContent = "Las contraseñas no coinciden.";
        valid = false;
    }

    if (institucion === "NValid") {
        document.getElementById('institucionError').textContent = "Por favor, selecciona una institución válida.";
        valid = false;
    }

    if (!valid) {
        event.preventDefault(); // Evita el envío del formulario si hay errores
    } else {
        event.preventDefault(); // Evita el envío del formulario para mostrar el popup y redirigir
        alert("Formulario enviado exitosamente. Tu institución pronto se pondrá en contacto contigo.");
        window.location.href = "inicio.php";
    }
}