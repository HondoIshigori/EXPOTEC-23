<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
        }
        body{
            background:linear-gradient(#000000ef, #191920ce);
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

            text-shadow: 0px 3px 3px rgba(41, 41, 41, 0.253);
        }

        img {
            max-width: 100px;
            width: auto;
            position: sticky;
            margin: 20px 0px 500px 80px;
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
            <h1>Cadastro</h1>
            <form method="POST">
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" required><br>
                <label for="nome">Nome de Usuário:</label><br>
                <input type="text" id="nome" name="nome" required><br>
                <label for="telefone">Telefone:</label><br>
                <input type="text" id="telefone" name="telefone" required><br>
                <label for="senha">Senha:</label><br>
                <input type="senha" id="password" name="senha" required><br>
                <input type="submit" value="Cadastrar"><br>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = $_POST["email"];
                        $name = $_POST["nome"];
                        $telefone = $_POST["telefone"];
                        $password = $_POST["senha"];
        
                        $conn = new mysqli("localhost", "root", "", "test02");
                        if ($conn->connect_error) {
                            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
                        }

                        $sql = "INSERT INTO cadastros (email, nome, telefone, senha) VALUES ('$email', '$name', '$telefone', '$password')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Cadastro realizado com sucesso!";
                            echo '<meta http-equiv="refresh" content="2;url=/expotec23/lobby_test.html">';
                        } else {
                            echo "Erro ao cadastrar: " . $conn->error;
                        }

                        $conn->close();
                    }
                ?>


                <center><h6><a href="http://localhost:80/expotec23/login.php">Já possui uma conta? Faça Login.</a></h6></center>

            </form>
        </div>
    </body>
</html>