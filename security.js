document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    var usuario = document.getElementById('usuario').value;
    var contrasena = document.getElementById('contrasena').value;

    // Verifica las credenciales
    if (usuario === 'luminous' && contrasena === 'indestructiblejaja') {
      // Si las credenciales son correctas, permite el acceso
      window.location.href = "/LUMINOUS/funciones/productos.php";
    } else {
      // Si las credenciales son incorrectas, muestra una alerta
      alert('No puedes pasar');
    }
  });

