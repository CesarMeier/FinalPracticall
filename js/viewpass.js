document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('clave');
    const toggleButton = document.getElementById('boton-clave');
    const toggleIcon = toggleButton.querySelector('i');

    toggleButton.addEventListener('click', function () {
        // Verifica el tipo del input
        if (passwordInput.type === 'password') {
            // Cambia el tipo a texto
            passwordInput.type = 'text';
            // Cambia el ícono a ojo visible
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        } else {
            // Cambia el tipo a contraseña
            passwordInput.type = 'password';
            // Cambia el ícono a ojo oculto
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        }
    });
});