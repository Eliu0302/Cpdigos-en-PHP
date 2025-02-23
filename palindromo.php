<!DOCTYPE html>
<html lang="es">
<head>
    <title> Palindromo</title>
</head>
<body>

    <h2>Verificador de Palindromos</h2>

    <form method="post">
        <label for="frase">Introduce una frase u oracion:</label><br>
        <input type="text" name="frase" required><br><br>
        <input type="submit" name="verificar" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $frase = $_POST["frase"];

        // Función para limpiar la frase (eliminar espacios, mayúsculas y signos)
        function limpiarTexto($texto) {
            $texto = strtolower($texto); // Convertir a minúsculas
            $texto = preg_replace('/[^a-z0-9áéíóúüñ]/u', '', $texto); // Eliminar caracteres especiales
            return $texto;
        }

        $fraseLimpia = limpiarTexto($frase);
        $fraseInvertida = strrev($fraseLimpia);

        if ($fraseLimpia == $fraseInvertida) {
            echo "<h3> La frase es un palíndromo.</h3>";
        } else {
            echo "<h3> La frase NO es un palíndromo.</h3>";
        }
    }
    ?>

</body>
</html>