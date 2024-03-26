<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Salário de Vendedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        p {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Calculadora de Salário de Vendedor</h1>
    <form method="post" action="">
        <label for="nome">Nome do Vendedor:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="meta_semanal">Meta Semanal (R$):</label><br>
        <input type="number" id="meta_semanal" name="meta_semanal" required><br><br>
        <label for="meta_mensal">Meta Mensal (R$):</label><br>
        <input type="number" id="meta_mensal" name="meta_mensal" required><br><br>
        <input type="submit" value="Calcular Salário">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $meta_semanal = $_POST["meta_semanal"];
        $meta_mensal = $_POST["meta_mensal"];
        $salario_minimo = 1500; 
        $meta_semanal_total = 20000; 
        $percentual_meta_semanal = 0.01; 
        $percentual_excedente_semanal = 0.05; 
        $percentual_excedente_mensal = 0.10; 
        $valor_meta_semanal = $meta_semanal * $percentual_meta_semanal;
        $valor_excedente_semanal = ($meta_semanal - $meta_semanal_total) * $percentual_excedente_semanal;
        if ($meta_semanal >= $meta_semanal_total) {
            $valor_excedente_mensal = ($meta_mensal - ($meta_semanal_total * 4)) * $percentual_excedente_mensal;
            $salario_final = $salario_minimo + $valor_meta_semanal + $valor_excedente_semanal + $valor_excedente_mensal;
        } else {
            $valor_excedente_mensal = 0;
            $salario_final = $salario_minimo + $valor_meta_semanal + $valor_excedente_semanal;
        }
        
        echo "<h2>Resultado</h2>";
        echo "<p>Nome do Vendedor: $nome</p>";
        echo "<p>Salário Final: R$ " . number_format($salario_final, 2, ',', '.') . "</p>";
    }
    ?>
</body>
</html>