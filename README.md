FUTBJJ

Vitor Vogel 22302212

Joao Lucas 22302450

Victor Marçal 22401377

Tiago lopes 22302522

Guilherme Ferreira 22402810

1-Cadastro de usuário X Cadastro de atleta Cadastro de colaborador (com CPF e telefone) Validação de senha e CPF Login automático após cadastro

2-Login X Login para atleta e colaborador Redirecionamento conforme tipo de usuário Menu lateral dinâmico (links exclusivos para colaborador)

4-Divulgação de campeonatos X Formulário para colaborador divulgar campeonatos Salva dados no banco (nome, local, data, premiação, descrição, imagem, colaborador_id) Mensagem de sucesso após envio

5-Divulgação de arenasX Formulário para colaborador divulgar arenas (com modalidade) Salva dados no banco (nome, endereço, cidade/estado, descrição, modalidade, colaborador_id) Mensagem de sucesso após envio

6-Listagem de campeonatosX Exibe campeonatos cadastrados no banco com layout padronizado Botão "Fazer inscrição" para cada campeonato

7-Inscrição em campeonatosX Modal de confirmação de inscrição Inscrição automática usando dados do usuário logado Salva inscrição no banco (usuario_id, campeonato_id) Mensagem de sucesso após inscrição

8-Painel do colaborador X Exibe campeonatos divulgados pelo colaborador logado Mostra quantidade de inscritos e informações (nome, email) de cada atleta

10-Visualização dos dados do usuárioX Página "Minha Conta" para atletas (nome, email, CPF, campeonatos inscritos) Página "Meus Dados" para colaborador (ID, nome, email, telefone, tipo) Página "Meus Dados Participante" para atletas (dados pessoais e campeonatos inscritos) Envio de mensagens para organização

11-Formulário para contato no siteX Salva mensagem no banco (mensagens_site) Mensagem de sucesso após envio

12-Avaliação do siteX Modal de avaliação com estrelas e comentário Salva avaliação no banco (avaliacoes_site) Mensagem de sucesso após envio

13-Menu lateral dinâmicoX Exibe nome do usuário logado e botão de logout Links exclusivos para colaborador ou atleta

3-LogoutX Botão de sair em todas as páginas Limpa dados do usuário e retorna ao login

Instruções para rodar o projeto

    Pré-requisitos
        PHP 7.4+ instalado
        MySQL/MariaDB rodando
        Servidor local (Wamp)
        Navegador web

    Configuração do banco de dados
        Importe o script SQL do projeto para criar as tabelas no MySQL.
        Edite o arquivo php/config/db.php com os dados do seu banco (host, usuário, senha, nome do banco).

    Estrutura de pastas
        Coloque todos os arquivos do projeto na pasta c:\wamp64\www\PIT (ou equivalente no seu servidor local).

    Inicie o servidor
        Abra o Wamp e inicie os serviços Apache e MySQL.

    Acesse o projeto
        No navegador, acesse: http://localhost/PIT/
        Use os arquivos HTML para navegar (ex: cadastro.html, login.html, paginainicial.html).

6.Testando funcionalidades

    Cadastre usuários e colaboradores.
    Faça login.
    Divulgue campeonatos e arenas.
    Realize inscrições e navegue pelo painel.
    Envie mensagens e avaliações.

[▶️ Assista no YouTube o tutorial] https://youtu.be/liXnCk9W9yo?si=8sCZY4pgJSeRkXoy
https://youtu.be/XhYv3o7-R1A?si=7h6AZVcun0XbG6O9
