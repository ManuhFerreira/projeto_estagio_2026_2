<?php 
    require 'rb.php';
    R::setup ('mysql:host=localhost;dbname=projeto_estagio_2026_2',
        'root', '');
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_pessoa = $_POST['id'];

        $pessoa = R::load('tbpessoas', $id_pessoa);

        if($pessoa->id) {
            $pessoa->nomecompleto = $_POST['nome'];
            $pessoa->nascimento = $_POST['data'];
            $pessoa->cpf = $_POST['cpf'];
            $pessoa->celular = $_POST['celular'];
            $pessoa->cidade = $_POST['cidade'];
            $pessoa->parcelas = $_POST['parcelas'];
            $pessoa->parcelaspagas = $_POST['parcelaspagas'];
            $pessoa->status = $_POST['status'];
            $pessoa->observacoes = $_POST['obs'];

            R::store($pessoa);

            header("Location: lista.php");
            exit;

            echo "Cadastro atualizado com sucesso! ";
        } else {
            echo "Erro: Pessoa não encontrada.";
        }
    } else {
        $id_pessoa = $_GET['id'];

        $pessoa = R::load('tbpessoas', $id_pessoa);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Editar Cadastro</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho">
            <h1>Acampamento PHN 2027 </h1>
            <img src="montanha.png" alt="Imagem de uma montanha">
        </div>
    </header>

    <main>
        <form action="editar.php" method="POST">
            <div class="cadastro">
                <h2>Ficha de Cadastro</h2>

                <input type="hidden" name="id" value="<?php echo $pessoa->id; ?>">

                <label for="nome-completo">Nome Completo: <br></label>
                <input type="text" name="nome" id="nome" placeholder="Ex: Emanuele Rodrigues Ferreira" value="<?php echo $pessoa->nomecompleto; ?>" required>

                <label for="data-nascimento"><br>Data de Nascimento: <br></label>
                <input type="date" name="data" id="data" value="<?php echo $pessoa->nascimento; ?>" required>

                <label for="cpf"><br>CPF: <br></label>
                <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" value="<?php echo $pessoa->cpf; ?>" required>

                <label for="celular"><br>Celular/Whatsapp: <br></label>
                <input type="text" name="celular" id="celular" placeholder="(00) 00000-0000" value="<?php echo $pessoa->celular; ?>" required>

                <label for="cidade"><br>Cidade onde mora: <br></label>
                <input type="text" name="cidade" id="cidade" placeholder="Ex: Montes Claros - MG" value="<?php echo $pessoa->cidade; ?>" required>

                <label for="parcelas"><br>Quantidade de parcelas(via pix): <br></label>
                <select name="parcelas" id="parcelas">
                    <option value="1" <?php if($pessoa->parcelas == "1") {
                            echo "selected";
                        }?>>1x R$1.850,00</option>
                    <option value="2" <?php if($pessoa->parcelas == "2") {
                            echo "selected";
                        }?>>2x R$925,00</option>
                    <option value="5" <?php if($pessoa->parcelas == "5") {
                            echo "selected";
                        }?>>5x R$370,00</option>
                    <option value="10" <?php if($pessoa->parcelas == "10") {
                            echo "selected";
                        }?>>10x R$185,00</option>
                </select>
                
                <br>
                <label for="parcelaspagas">Quantidade de parcelas pagas(apenas números): </label>
                <input type="text" name="parcelaspagas" id="parcelaspagas" placeholder="Ex:5" value="<?php echo $pessoa->parcelaspagas; ?>" required>

                <label for="faltaparcelas">
                    <?php
                        $totalparcela = (int) $pessoa->parcelas;
                        $pagas = (int) $pessoa->parcelaspagas;
                        $faltaparcelas = $totalparcela - $pagas;

                        echo "Faltam $faltaparcelas parcelas.";
                    ?> 
                </label>

                <label for="observacoes"><br>Observações: <br></label>
                <textarea id="obs" name="obs" rows="5" placeholder="Ex: medicamento controlado, diabetes, hipertensão, mobilidade reduzida, alergia grave, epilepsia."><?php echo $pessoa->observacoes; ?></textarea>

                <br>
                <label for="status">Status: </label>
                <select name="status" id="status">
                    <option value="PENDENTE" <?php if($pessoa->status == "PENDENTE") {
                        echo "selected";
                    } ?>>PENDENTE</option>
                    <option value="CONFIRMADO" <?php if($pessoa->status == "CONFIRMADO") {
                        echo "selected";
                    } ?>>CONFIRMADO</option>
                    <option value="CANCELADO" <?php if($pessoa->status == "CANCELADO") {
                        echo "selected";
                    } ?>>CANCELADO</option>
                </select>

                <button type="submit" class="enviar">Enviar</button>
            </div>
            </form>
    </main>

    <footer>
        Emanuele Ferreira &copy; - 2026
    </footer>
</body>
</html>