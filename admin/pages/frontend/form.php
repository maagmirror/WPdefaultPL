<?php
// render in admin page

echo "<h2>" . pluginTitle . "</h2>";

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
    <label for="nuevoUsuario">Nuevo Usuario:</label>
    <input type="text" name="nuevoUsuario" id="nuevoUsuario" class="regular-text" value="<?php echo esc_attr($datosUsuario['user']); ?>" required>

    <br>

    <label for="nuevaContraseña">Nueva Contraseña:</label>
    <input type="password" name="nuevaContraseña" id="nuevaContraseña" class="regular-text" value="<?php echo esc_attr($datosUsuario['pass']); ?>" required>

    <br>

    <input type="submit" value="Actualizar" class="button button-primary">
</form>
