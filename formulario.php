<?php
    require 'conexaoBD.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $pessoa = R::dispense('tbpessoas');

        $pessoa->nomecompleto = $_POST['nome'];
        $pessoa->nascimento = $_POST['data'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->celular = $_POST['celular'];
        $pessoa->cidade = $_POST['cidade'];
        $pessoa->parcelas = $_POST['parcelas'];
        $pessoa->observacoes = $_POST['obs'];
        $pessoa->status = 'PENDENTE';

        R::store($pessoa);

        header('Location: formulario.php');
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Caravana PHN 2027</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho">
            <h1>Acampamento PHN 2027 </h1>
            <img src="montanha.png" alt="Imagem de uma montanha">
        </div>
    </header>

    <main>
        <div class="formulario">
            <button type="button" class="acesso"><i class="fa-solid fa-lock"></i></button>
            <div class="informacoes">
            <h2>-Informações- </h2>
            <h3>Tema: Do Alto da Montanha</h3>
            <p>O evento trará o tema "Do alto da
            montanha", inspirado no Sermão da 
            Montanha e na entrega da Lei no Monte Sinai.</p>
            <p>📅​Data: 12 a 18 de Julho</p>
            <p>​📍​Local: Cachoeira Paulista - SP</p>
            </div>

            <form action="formulario.php" method="POST">
            <div class="cadastro">
                <h2 class="cadastro">Ficha de Cadastro</h2>

                <label for="nome-completo">Nome Completo: <br></label>
                <input type="text" name="nome" id="nome" placeholder="Ex: Emanuele Rodrigues Ferreira" required>

                <label for="data-nascimento"><br>Data de Nascimento: <br></label>
                <input type="date" name="data" id="data" required>

                <label for="cpf"><br>CPF: <br></label>
                <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required>

                <label for="celular"><br>Celular/Whatsapp: <br></label>
                <input type="text" name="celular" id="celular" placeholder="(00) 00000-0000" required>

                <label for="cidade"><br>Cidade onde mora: <br></label>
                <input type="text" name="cidade" id="cidade" placeholder="Ex: Montes Claros - MG" required>

                <label for="parcelas"><br>Quantidade de parcelas(via pix): <br></label>
                <select name="parcelas" id="parcelas">
                    <option value="1">1x R$1.850,00</option>
                    <option value="2">2x R$925,00</option>
                    <option value="5">5x R$370,00</option>
                    <option value="10">10x R$185,00</option>
                </select>
                
                <label for="observacoes"><br>Observações: <br></label>
                <textarea id="obs" name="obs" rows="5" placeholder="Ex: medicamento controlado, diabetes, hipertensão, mobilidade reduzida, alergia grave, epilepsia."></textarea>

                <button type="submit" class="enviar">Enviar</button>
            </div>
            </form>
        </div>
    </main>

    <footer>
        Emanuele Ferreira &copy; - 2026
    </footer>
</body>
</html>