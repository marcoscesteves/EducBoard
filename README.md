# 🎓 EducBoard

**EducBoard** é um sistema simples e direto para gestão de turmas, professores e alunos, desenvolvido em PHP com MySQL. Ideal para instituições de ensino ou projetos educacionais que precisam organizar inscrições de forma eficiente.

**Bibliotecas utilizadas**

Este projeto utiliza [PHPMailer](https://github.com/PHPMailer/PHPMailer), licenciado sob a MIT License.
Além disso, utilizamos bootstrap e FontAwesome!

## 🎥 Demonstração

[![Assista ao vídeo](https://img.youtube.com/vi/IYGEGUccX9E/0.jpg)](https://youtu.be/IYGEGUccX9E)


---

## 🚀 Funcionalidades

- Cadastro de turmas com data, horário, local e vagas
- Associação de professores às turmas
- Inscrição de alunos em turmas
- Autenticação de usuários
- Interface leve e adaptável
- Integração com MySQL
- Estrutura orientada a objetos com PDO

---

## 🛠️ Tecnologias Utilizadas

- PHP (com PDO)
- MySQL
- HTML + Bootstrap

---

## 📦 Estrutura do Projeto

```
EducBoard/
├── classes/
│   ├── aluno.php
│   ├── conexao.php
│   ├── professor.php
│   └── turma.php
├── banco/
│   └── criar_tabelas.sql
├── criar-turmas.php
├── turma-sucesso.php
├── painel-principal.php
├── index.php
├── README.md
```

---

## 🧪 Como Usar

1. **Faça o download**:
   - Realize o download ou clone o repositório

2. **Configure o banco de dados**:
   - Importe o arquivo `config/criar_tabelas.sql` no phpMyAdmin

3. **Faça upload dos arquivo do projeto**
   - Faça o upload dos arquivos via FTP (preferencialmente usando filezilla)

4. **Realizar as configurações no arquivo config.php**:

   - Edite `config/config.php` e configure os nomes/títulos que devem aparecer na aba do navegador e no título do cabecalho. Essas informações aparecem em todas as páginas do site.
    
         // Substitua para os valores de seu projeto: 
         'site' => [ 
            'tituloAba' => '...', // Título que apareçe na aba dos navegador (em todas as páginas)
            'tituloCabecalho' => '...', // Título que aparece no cabeçalho
         ],

   - Edite `config/config.php` e insira as informações de acesso ao banco de dados, conforme abaixo:

         // 🗃️ Conexão com o banco de dados interno da aplicação  
         'database' => [  
            'host' => 'localhost',         -> Inserir host 
            'port' => 3306,                -> Porta de acesso
            'name' => 'db_name',           -> Nome do banco a ser acessado 
            'user' => 'db_username',       -> usuário para login (acesso) no banco 
            'password' => 'db_password',   -> password para acesso 
            'charset' => 'utf8mb4',        -> Para projetos em português, não altere esta linha 
         ], 


5. **Mude a senha do administrador**:
   - Ao executar o script na etapa 2 (criar_tabelas.sql) um usuário de administrador
     é criado com uma senha default. Favor alterar esta senha logo nesta etapa:
     e-mail: adm@educboard.com
     senha: adm

6. **Configurar a mensagem de confirmação para os alunos:**
   - A mensagem aparece no momento em que o aluno/usuário pretende se inscrever numa turma. A ideia é colocar as regras para a turma ou demais informações que precisam ser oferecidas. Vale ressaltar que essa mensagem é padrão para todas as turmas.

7. Configurando e-mail para envio de e-mails e recuperação de senhas.
   - Fique a vontade de usar qualquer outra solução, que deverá ser configurada no formulário esqueci-senha-post.php
   - Por padrão vamos usar uma conta do gmail para enviar as configurações. Para tal, siga as seguintes etapas:
      - a) Ative a verificação em duas etapas no seu gmail;
      - b) Vá em senhar de APPs e cadastre um acesso para um aplicativo (https://myaccount.google.com/apppasswords)
      - c) A senha gerada será utilizada na página esqueci-senha-post:
         - i) Preencher os seguintes campos: <br>
               $mail->Username   = 'educboard@gmail.com';  // Seu Gmail <br>
               $mail->Password   = 'senha do app criada';  // 🔒 Sua senha de app (não a senha normal) <br>
               $mail->setFrom('educboard@gmail.com', 'Plataforma Educacional'); <br>
         - ii) O conteúdo do e-mail que será enviado pode ser alterado em body.

8. **Substituir logo no cabeçalho:**
   - A logo exibida no cabeçalho do projeto aparece em todas as páginas da plataforma. Sinta-se à vontade para substituí-la pela logo da sua escola, empresa ou plataforma.
   Caso deseje, é recomendável (mas não obrigatório) manter uma menção ao nosso repositório no rodapé, como forma de agradecimento.
   Para trocar a logo, basta editar o arquivo cabecalho.php.

9. **Habilitar SSL:**
   - O SSL (Secure Socket Layer) é essencial para garantir a segurança das informações entre o servidor e o navegador, criptografando dados como senhas e informações pessoais, tornando a comunicação mais segura. Recomendo fortemente que seja habilitado em sua hospedagem.

## Exemplo de configuração na hospedagem gratuita InfinityFree (https://www.infinityfree.com/)

1. Faça o download do site no github do projeto (https://github.com/marcoscesteves/EducBoard)
   - Clicar no botão "Code" e, em seguinda, clicar em "Download Zip";
   - Descompactar este arquivo em alguma pasta;
   - Estes arquivos serão enviados para a hospedagem na etapa 5;


2. Registre-se e crie uma hospedagem.
   - Neste caso, a hospedagem gratuita já atente aos requisitos que precisamos. Mas fique à vontade em escolher o plano que melhor o atenda;

3. Crie uma base de dados MySQL
   - Em "Opções de Conta" clique em "MySQL Database" e, em seguida, em "Create DataBase";
   - Na tela que aparecerá escolhe qualquer nome que desejar para sua base e clique em CreateDatabe. Guarde o nome da sua base, que vamos precisar.

4. Ajuste a base de dados
   - Após criada a base de dados, clique em phpMyAdmin para administrar sua base de dados;
   - Ao entrar no PHPMyAdmin, clique em SQL e cole o conteúdo do arquivo "criar_tabelas.sql" e, em seguida, clique em executar. Neste etapa, atente que arrastar o próprio arquivo para dentro da consulta pode levar a erros; motivo pelo qual, recomenda-se que copie e cole o conteúdo ali;

5. Enviar arquivos para a hospedagem
   - A forma ideal de se enviar arquivos é por FTP e usando algum programa específico, como, por exemplo, o FileZilla. Não recomendamos o envio através do gerenciador de arquivos padrão disponibilizado pela infinityfree -> em nossos testes, alguns arquivos apresentaram problemas durante o envio;
   - Nesta etapa, enviaremos os arquivos descompactados na etapa 1 acima
   - Ao descompactar o arquivo ZIP, haverá uma pasta chamada EducBoard-main. Selecionar todos os arquivos de dentro desta pasta e enviar para dentro da pasta htdocs;

6. Realizar as configurações 4 a 7 do tópico "Como Usar" (#Como-Usar)

7. O infinityfree não utiliza SSL para hospedagens gratuitas. Então, utilize apenas para efeitos de testes ou procure um servidor com SSL.
   
   
---

## 🤝 Contribuindo

Pull requests são bem-vindos! Para grandes mudanças, abra uma issue primeiro para discutirmos o que você quer modificar.

---

## 📄 Licença

MIT License — sinta-se livre para usar, modificar e compartilhar.

---

> Feito com ❤️ por Marcos Cabanas Esteves
