<!DOCTYPE html>
<html lang="pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
        }
        body{
            background:linear-gradient(#1d131d, #000000ee);
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
            margin-right: 0px;

            position: sticky;
            background-repeat: no-repeat;
            background-attachment: fixed;
            
        }
        .box-clientes{
            background:white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 2px 12px rgba(255, 255, 255, 0.438);
            outline-style: solid;
            outline-width: 1px;

            overflow: hidden;
        }
        input[type="submit"] {
            background:rgba(0, 173, 253, 0.89);
            box-shadow: 0px 2px 2px rgb(117, 147, 158);
        }

        input{
            height: 30px;
            width: 100%;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        h1{
            padding: 5px 75px;
            margin-top: 0px 5px;
            margin-right: 0px 20px;
            text-align: center;
            text-shadow: 0px 3px 3px rgba(41, 41, 41, 0.253);
        }

        img {
            max-width: 100px;
            width: auto;
            position: sticky;
            margin: 140px 0px 500px 80px;
            margin-right: -300px;
            margin-left: 4px;
        }

    </style>
</head>
    <body>
        <div class="container">
        <img src="https://www.fatef.com.br/wp-content/uploads/2020/04/LOGO-BRANCA-SEM-FUNDO-MENOR-300x233.png">
        </div>
        <div class="box-clientes">
            <h1>Login</h1>
            <form method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br>
            <label for="senha">Senha:</label>
            <input type="senha" id="senha" name="senha" required><br>
            <input type="submit" value="Entrar">

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = $_POST["email"];
                        $password = $_POST["senha"];
    
                        $conn = new mysqli("localhost", "root", "", "test02");
                        if ($conn->connect_error) {
                            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM cadastros WHERE email = '$email' AND senha = '$password'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo "Login feito!";
                            echo '<meta http-equiv="refresh" content="2;url=/expotec23/lobby_test.html">';
                        } else {
                            echo "Login falhou. Verifique suas credenciais.";
                        }
    
                        $conn->close();
                    }
                ?>

                <center><h6><a href="http://localhost:80/expotec23/cadastro.php">Não possui uma conta? Cadastre-se.</a></h6></center>

            </form>
        </div>
    </body>
</html>

