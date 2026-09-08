# Decisões — Cadastro de Passageiros para a Caravana PHN 2027

## Por que eu escolhi fazer esse tipo de registro?

Eu escolhi fazer esse cadastro de passageiros porque já era um projeto que eu vinha conversando com minha amiga para desenvolver, com o objetivo de cadastrar os passageiros da caravana do ano que vem de forma digital. Vi neste teste prático uma oportunidade para dar início ao projeto e tirá-lo do papel.

## Por que eu escolhi essa stack?

Escolhi HTML, CSS, PHP com RedBean e um pouco de JavaScript porque é o que eu tenho mais domínio no momento, e porque considerei suficiente para atender ao que foi pedido no teste.

## O que a especificação não diz

Ao longo do desenvolvimento, percebi algumas situações que a especificação não cobria diretamente:

**Tabela vazia**: se ninguém tiver cadastrado nenhum passageiro ainda, a lista aparece vazia, sem nenhuma mensagem indicando isso. Não tratei essa situação por falta de tempo, mas, para a entrega, optei por exportar o banco de dados já com um cadastro de exemplo, para que fique claro que o sistema funciona corretamente assim que aberto.

**Campos obrigatórios**: usei o atributo `required` do HTML nos campos essenciais do formulário, então o navegador impede o envio caso algum deles esteja vazio.

**Parcelas pagas maior que o total**: não tratei essa validação. Como o campo de "parcelas pagas" é preenchido apenas por mim e minha amiga (administradoras), e não pelo público em geral, considerei um risco baixo o suficiente para não priorizar essa validação nesta entrega — mas reconheço que seria importante adicionar essa checagem em uma versão futura, para evitar cálculos incorretos por erro de digitação.

**CPF duplicado**: percebi que o sistema permite que uma mesma pessoa se inscreva mais de uma vez, já que não há nenhuma verificação de CPF já cadastrado. Não implementei essa validação nesta entrega por causa do prazo, mas reconheço que é um problema real — poderia gerar cadastros duplicados por engano, o que atrapalharia o controle de vagas e pagamentos. Em uma próxima versão, pretendo adicionar uma verificação que impeça (ou pelo menos alerte) quando um CPF já existente for cadastrado novamente.

**Exclusão acidental**: como excluir um cadastro é uma ação irreversível, percebi que seria arriscado deixar essa ação acontecer com um único clique, sem nenhuma confirmação. Para reduzir o risco de exclusões acidentais, adicionei uma confirmação via JavaScript (`confirm()`) antes de qualquer exclusão ser processada, exigindo que a administradora confirme a ação antes dela ser executada de fato.

**Formato do CPF**: percebi que o campo de CPF tem apenas um `placeholder` sugerindo o formato esperado (`000.000.000-00`), mas não há nenhuma validação ou máscara real impedindo que a pessoa digite de outra forma. Isso pode gerar inconsistência na exibição da lista (alguns CPFs formatados, outros não). Não implementei uma máscara ou validação de formato nesta entrega por causa do prazo, mas reconheço que seria uma melhoria importante para manter os dados padronizados — seja limitando a digitação já no campo (com JavaScript), seja validando o formato antes de salvar no banco.

## Sessão IA

### O que você delegou para a IA e o que fez à mão, e por quê

Toda a estrutura HTML, as regras de negócio em PHP (como o cálculo de parcelas) e o layout inicial em CSS eu fiz à mão. Deleguei para a IA a resolução de bugs pontuais e dúvidas de sintaxe que tomariam muito tempo de pesquisa. Por exemplo, tive dúvidas sobre como formatar a data do formato do banco de dados (`aaaa-mm-dd`) para o padrão brasileiro (`dd/mm/aaaa`) em PHP, e sobre como resolver o erro "Undefined array key" ao trabalhar com `$_GET` e `$_POST`. Fiz isso para otimizar meu tempo e focar na lógica principal do projeto.

### Uma vez em que a IA te deu algo ruim ou errado: o que era, como você percebeu, e o que fez no lugar

Quando pedi ajuda porque o estilo do meu botão não estava mudando, a IA me sugeriu alterar o código CSS e verificar várias coisas complexas no HTML. Percebi que o código já estava certo — o problema real era apenas o cache do navegador, que não estava carregando o CSS atualizado. Em vez de reescrever o código como a IA sugeriu inicialmente, apertei Ctrl + F5 para limpar o cache, e o estilo passou a funcionar perfeitamente.

### Uma decisão que você tomou contra a sugestão da IA, e o motivo

A IA sugeriu criar um sistema completo de login conectado ao banco de dados, com criptografia de senha (`password_hash` e `password_verify`). Embora fosse a solução ideal do ponto de vista de segurança, decidi ir contra essa sugestão para esta entrega, mantendo um array estático (`$usuarios_validos = ["admin" => "admin123"]`). Tomei essa decisão pensando no prazo: preferi entregar um sistema de login funcional e testado, do qual eu entendesse exatamente o funcionamento, a arriscar não conseguir revisar bem uma implementação com criptografia dentro do tempo disponível. Pretendo evoluir essa parte de segurança no futuro, quando o projeto for usado de verdade por mim e pela minha amiga.
