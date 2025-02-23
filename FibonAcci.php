<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
</head>
<body>

    <h2>Sucesión de Fibonacci</h2>

    <form method="post">
        <label for="n">Ingrese el número de términos:</label>
        <input type="number" name="n" min="1" required><br><br>
        <input type="submit" name="generar" value="Generar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = intval($_POST["n"]);
        
        function fibonacci($n) {
            $fib = [0,1];
            for ($i = 2; $i < $n; $i++) {
                $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
            }
            return array_slice(array: $fib, offset: 0, length: $n);
        }

        $resultado = fibonacci($n);
        echo "<h3>Los primeros $n términos de la sucesión de Fibonacci:</h3>";
        echo implode(", ", $resultado);
    }
    ?>

</body>
</html>