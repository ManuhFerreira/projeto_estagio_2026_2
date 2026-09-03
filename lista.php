<?php
    require 'rb.php';
    R::setup ('mysql:host=localhost;dbname=projeto_estagio_2026_2',
        'root', '');

    $pessoa = R::findAll('tbPessoas');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lista.css">
    <title>Lista de pessoas</title>
</head>
<body>
    <main>
        <div class="lista">
            <button type="button" class="voltar">&#8592;</button>
            <h1>Lista de Pessoas</h1>
            <div class="filtro">
                <input type="search" name="filtro" id="filtro" placeholder="Pesquisar">
            </div>
            <div class="tabela">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>CPF</th>
                            <th>Celular/ Whatsapp</th>
                            <th>Cidade onde mora</th>
                            <th>Parcelas</th>
                            <th>Observações</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pessoa as $tbpessoas): ?>
                                
                            <tr>
                                <td><?php echo $tbpessoas->nomecompleto; ?></td>
                                <td><?php echo $tbpessoas->nascimento; ?></td>
                                <td><?php echo $tbpessoas->cpf; ?></td>
                                <td><?php echo $tbpessoas->celular; ?></td>
                                <td><?php echo $tbpessoas->cidade; ?></td>
                                <td><?php echo $tbpessoas->parcelas; ?></td>
                                <td><?php echo $tbpessoas->observacoes; ?></td>
                                <td><?php echo $tbpessoas->status; ?></td>
                                <td>
                                    <span class="editar" title="Editar">✏️</span>
                                    <span class="excluir" title="Excluir">🗑️</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>