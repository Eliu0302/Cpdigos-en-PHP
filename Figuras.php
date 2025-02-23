<!DOCTYPE html>
<html lang="es">
<head>
<title>Calculadora Geométrica</title>
</head>
<body>

    <h1>Calculadora de Área, Perímetro y Volumen</h1>

    <form method="post">
        <label for="figura">Seleccione la figura:</label>
        <select name="figura" required>
            <option value="cuadrado">Cuadrado</option>
            <option value="rectangulo">Rectángulo</option>
            <option value="triangulo">Triángulo</option>
            <option value="circulo">Círculo</option>
            <option value="cubo">Cubo</option>
            <option value="esfera">Esfera</option>
            <option value="cilindro">Cilindro</option>
            <option value="cono">Cono</option>
        </select>
        <br><br>

        <label for="valor1">Valor 1:</label>
        <input type="number" name="valor1" step="any" required><br><br>

        <label for="valor2">Valor 2 (si aplica):</label>
        <input type="number" name="valor2" step="any"><br><br>

        <label for="valor3">Valor 3 (si aplica):</label>
        <input type="number" name="valor3" step="any"><br><br>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $figura = $_POST["figura"];
        $valor1 = $_POST["valor1"];
        $valor2 = isset($_POST["valor2"]) ? $_POST["valor2"] :"0";
        $valor3 = isset($_POST["valor3"]) ? $_POST["valor3"] : 0;

        $area = $perimetro = $volumen = 0;

        switch ($figura) {
            case "cuadrado":
                $area = $valor1 * $valor1;
                $perimetro = 4 * $valor1;
                echo "<h3>Área del Cuadrado: $area</h3>";
                echo "<h3>Perímetro del Cuadrado: $perimetro</h3>";
                break;

            case "rectangulo":
                $area = $valor1 * $valor2;
                $perimetro = 2 * ($valor1 + $valor2);
                echo "<h3>Área del Rectángulo: $area</h3>";
                echo "<h3>Perímetro del Rectángulo: $perimetro</h3>";
                break;

            case "triangulo":
                $area = ($valor1 * $valor2) / 2;
                echo "<h3>Área del Triángulo: $area</h3>";
                break;

            case "circulo":
                $area = pi() * pow($valor1, 2);
                $perimetro = 2 * pi() * $valor1;
                echo "<h3>Área del Círculo: $area</h3>";
                echo "<h3>Perímetro del Círculo (circunferencia): $perimetro</h3>";
                break;

            case "cubo":
                $area = 6 * pow($valor1, 2);
                $volumen = pow($valor1, 3);
                echo "<h3>Área del Cubo: $area</h3>";
                echo "<h3>Volumen del Cubo: $volumen</h3>";
                break;

            case "esfera":
                $area = 4 * pi() * pow($valor1, 2);
                $volumen = (4/3) * pi() * pow($valor1, 3);
                echo "<h3>Área de la Esfera: $area</h3>";
                echo "<h3>Volumen de la Esfera: $volumen</h3>";
                break;

            case "cilindro":
                $area = 2 * pi() * $valor1 * ($valor1 + $valor2);
                $volumen = pi() * pow($valor1, 2) * $valor2;
                echo "<h3>Área del Cilindro: $area</h3>";
                echo "<h3>Volumen del Cilindro: $volumen</h3>";
                break;

            case "cono":
                $g = sqrt(pow($valor1, 2) + pow($valor2, 2)); // Generatriz
                $area = pi() * $valor1 * ($valor1 + $g);
                $volumen = (1/3) * pi() * pow($valor1, 2) * $valor2;
                echo "<h3>Área del Cono: $area</h3>";
                echo "<h3>Volumen del Cono: $volumen</h3>";
                break;

            default:
                echo "<h3>Figura no Valida </h3>";
        }
    }
    ?>

</body>
</html>