# Caravana PHN 2027 — Cadastro de Passageiros

Sistema para cadastro e gestão de passageiros da caravana para o Acampamento PHN 2027. Permite que participantes se inscrevam através de um formulário público, e que administradores controlem a lista de inscritos, pagamentos e status de confirmação através de um painel protegido por login.

> Projeto desenvolvido como teste técnico, com o objetivo de também servir como ferramenta real para a organização do acampamento.

## Funcionalidades

- **Formulário público de inscrição** — nome, data de nascimento, CPF, celular, cidade, quantidade de parcelas e observações (condições de saúde, alergias, restrições alimentares)
- **Painel administrativo protegido por login** — acesso restrito via sessão, apenas para administradores
- **Listagem de passageiros** — com busca por nome
- **Edição de cadastro** — atualização de todos os dados, incluindo controle de parcelas pagas e status (pendente/confirmado/cancelado)
- **Cálculo automático de parcelas faltantes** — com base no total de parcelas escolhido e nas parcelas já pagas
- **Exclusão de cadastro**, com confirmação antes de excluir
- **Logout** da sessão administrativa

## Tecnologias utilizadas

- HTML5 e CSS3
- JavaScript (Vanilla JS)
- PHP
- MySQL
- [RedBeanPHP](https://redbeanphp.com/) — ORM utilizado para simplificar a comunicação com o banco de dados

## Pré-requisitos

Para rodar este projeto localmente, você vai precisar de um ambiente com **PHP** e **MySQL**. A forma mais simples de conseguir isso é instalando o **[XAMPP](https://www.apachefriends.org/pt_br/index.html)**, que já inclui tudo o que é necessário em um único pacote:

- PHP 7.4 ou superior
- MySQL / MariaDB
- Servidor Apache

Não é necessário instalar nenhuma dependência via Composer ou npm — o projeto utiliza a biblioteca RedBeanPHP já incluída na pasta do projeto (arquivo `rb.php`).
[banco.sql](https://github.com/user-attachments/files/31933537/banco.sql)

## Instalação e execução

### 1. Clone o repositório

Coloque a pasta do projeto dentro do diretório `htdocs` do seu XAMPP (geralmente localizado em `C:\xampp\htdocs\` no Windows):

```bash
git clone https://github.com/seu-usuario/caravana-phn-2027.git
```

### 2. Inicie o Apache e o MySQL

Abra o **XAMPP Control Panel** e clique em **"Start"** nos módulos **Apache** e **MySQL**.

### 3. Prepare o banco de dados

1. Acesse o **phpMyAdmin** (geralmente em `http://localhost/phpmyadmin`)
2. Crie um novo banco de dados chamado `projeto_estagio_2026_2`
3. Selecione esse banco recém-criado e vá até a aba **"Importar"**
4. Escolha o arquivo `banco.sql` (incluído neste repositório) e clique em **"Executar"**

Isso vai criar automaticamente a tabela `tbpessoas`, já com um cadastro de exemplo, para que você possa visualizar o sistema funcionando imediatamente.

> Caso prefira, o projeto também cria as colunas automaticamente ao salvar o primeiro cadastro pelo formulário, graças ao modo "fluido" do RedBeanPHP — mas importar o `banco.sql` é a forma mais rápida de já começar com dados de exemplo.

### 4. Configuração de conexão com o banco

A conexão com o banco de dados está definida no arquivo `conexaoBD.php`:

```php
R::setup('mysql:host=localhost;dbname=projeto_estagio_2026_2', 'root', '');
```

Caso o seu MySQL utilize um usuário ou senha diferente do padrão do XAMPP (`root`, sem senha), ajuste essas informações diretamente nesse arquivo.

### 5. Acesso administrativo (login)

As credenciais de acesso ao painel administrativo estão definidas diretamente no arquivo `login.php`, de forma fixa (sem cadastro dinâmico de novos administradores nesta versão):

```php
$usuarios_validos = [
    "admin" => "admin123"
];
```

Use essas credenciais para acessar a área administrativa. Caso deseje alterar o usuário/senha, edite diretamente esse array.

### 6. Acesse a aplicação

Com o Apache e o MySQL rodando, e o banco já importado, acesse no navegador:

```
http://localhost/caravana-phn-2027/formulario.php
```

> Ajuste o nome da pasta na URL de acordo com o nome que você deu ao projeto dentro de `htdocs`.

## Estrutura de páginas

| Página | Descrição | Acesso |
|---|---|---|
| `formulario.php` | Formulário público de inscrição | Livre |
| `login.php` | Login administrativo | Livre |
| `lista.php` | Lista de passageiros cadastrados | Restrito (login) |
| `editar.php` | Edição de um cadastro específico | Restrito (login) |
| `excluir.php` | Exclusão de um cadastro | Restrito (login) |
| `logout.php` | Encerra a sessão administrativa | Restrito (login) |

Para mais detalhes sobre decisões técnicas tomadas ao longo do desenvolvimento, consulte o arquivo [`DECISOES.md`](./DECISOES.md).

---

Desenvolvido por Emanuele Ferreira 💛
