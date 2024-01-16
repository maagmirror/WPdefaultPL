<?php
// render in admin page

echo "<h2>" . pluginTitle . "</h2>";



// Incluir el archivo de configuración y conexión a la base de datos
// include 'config.php';
global $wpdb;
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nuevoUsuario = sanitize_text_field($_POST['nuevoUsuario']);
    $nuevaContraseña = sanitize_text_field($_POST['nuevaContraseña']);

    // Actualizar los datos en la base de datos
    $wpdb->update(
        'nibiru_service',
        array('user' => $nuevoUsuario, 'pass' => $nuevaContraseña),
        array('id' => 1),
        array('%s', '%s'),
        array('%d')
    );

    echo '<p>Datos actualizados correctamente.</p>';
}

// Obtener los datos actuales del usuario con ID 1

$datosUsuario = $wpdb->get_row($wpdb->prepare('SELECT user, pass FROM nibiru_service WHERE id = %d', 1), ARRAY_A);
?>

<!-- Formulario para actualizar datos -->
<form method="post" action="">
    <label for="nuevoUsuario">Usuario:</label>
    <input type="text" name="nuevoUsuario" id="nuevoUsuario" class="regular-text"
        value="<?php echo esc_attr($datosUsuario['user']); ?>" required>

    <br>

    <label for="nuevaContraseña">Contraseña:</label>
    <input type="password" name="nuevaContraseña" id="nuevaContraseña" class="regular-text"
        value="<?php echo esc_attr($datosUsuario['pass']); ?>" required>

    <br>

    <input type="submit" value="Actualizar" class="button button-primary">

</form>

<hr><br></hr>

<input type="submit" value="Importar" class="button button-primary" id="actualizarBtn">
<!-- Div para mostrar la respuesta -->
<div id="respuestaDiv"></div>

<script>
    // Script de jQuery para manejar la solicitud AJAX
    jQuery(document).ready(function ($) {
        $('#actualizarBtn').on('click', function (e) {
            e.preventDefault();

            // Obtén los datos del formulario
            var nuevoUsuario = $('#nuevoUsuario').val();
            var nuevaContraseña = $('#nuevaContraseña').val();

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: 'ajax-handler.php',  // Ruta al archivo PHP de manejo de AJAX
                data: {
                    nuevoUsuario: nuevoUsuario,
                    nuevaContraseña: nuevaContraseña
                },
                dataType: 'json',
                success: function (response) {
                    // Muestra la respuesta en el div
                    $('#respuestaDiv').append('<p>' + response.resultado + '</p>');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Muestra mensajes de error en el div
                    $('#respuestaDiv').append('<p>Error en la solicitud AJAX: ' + textStatus + ' - ' + errorThrown + '</p>');
                }
            });
        });
    });
</script>

<style>
    #respuestaDiv {
        width: 50%;
        height: 400px;
        overflow-x: hidden;
        overflow-y: scroll;
        background-color: #d8d8d8;
        padding: 10px;
        margin-top: 20px;
    }
</style>
