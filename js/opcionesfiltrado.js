document.getElementById('filtrado').addEventListener('change', function() {
    // Ocultar todos los campos primero
    document.getElementById('mecanico-container').style.display = 'none';
    document.getElementById('cliente-container').style.display = 'none';
    document.getElementById('auto-container').style.display = 'none';
    
    // Mostrar el campo correspondiente a la opción seleccionada
    if (this.value == '1') {
        document.getElementById('mecanico-container').style.display = 'block';
    } else if (this.value == '2') {
        document.getElementById('cliente-container').style.display = 'block';
    } else if (this.value == '3') {
        document.getElementById('auto-container').style.display = 'block';
    }
});
