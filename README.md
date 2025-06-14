# 🎓 EducBoard

**EducBoard** é um sistema simples e direto para gestão de turmas, professores e alunos, desenvolvido em PHP com MySQL. Ideal para instituições de ensino ou projetos educacionais que precisam organizar inscrições de forma eficiente.

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

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/seu-usuario/educboard.git
   ```

2. **Configure o banco de dados**:
   - Importe o arquivo `banco/criar_tabelas.sql` no phpMyAdmin

3. **Configure a conexão**:
   - Edite `classes/conexao.php` com seu usuário, senha e nome do banco

4. **Execute o sistema**:
   - Coloque o projeto na pasta correta do seu servidor 

5. **Mude a senha do administrador**:
   - Ao executar o script na etapa 2 (criar_tabelas.sql) um usuário de administrador
     é criado com uma senha default. Favor alterar esta senha logo nesta etapa:
     e-mail: adm@educboard.com
     senha: adm

6. **Configurar a mesangem de confirmação para os alunos:**
   - A mensagem aparece no momento em que o aluno/usuário pretende se inscrever numa turma. A ideia é colocar as regras para a turma ou demais informações que precisam ser oferecidas. Vale ressaltar que essa mensagem é padrão para todas as turmas.

7. **Substituir logo no cabeçalho:**
   - A logo exibida no cabeçalho do projeto aparece em todas as páginas da plataforma. Sinta-se à vontade para substituí-la pela logo da sua escola, empresa ou plataforma.
   Caso deseje, é recomendável (mas não obrigatório) manter uma menção ao nosso repositório no rodapé, como forma de agradecimento.
   Para trocar a logo, basta editar o arquivo cabecalho.php.

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
   - Clique em Contas (Accounts) entre em sua conta e, em seguida, clique em "File Manager"
   - Ao entrar no gerenciador de arquivos "File Manager", entrar no diretório htdocs
   - Nesta etapa, enviaremos os arquivos descompactados na etapa 1 acima
   - Ao descompactar o arquivo ZIP, haverá uma pasta chamada EducBoard-main. Selecionar todos os arquivos de dentro desta pasta e enviar para dentro da pasta htdocs;

6. Testes
   - Agora é o momento de testar se seu site já está funcionando;
   - Atentar que ao criar o domínio pelo infinityfree demora algumas horas para que o domínio esteja funcionando;
   
   
    

---

## 🤝 Contribuindo

Pull requests são bem-vindos! Para grandes mudanças, abra uma issue primeiro para discutirmos o que você quer modificar.

---

## 📄 Licença

MIT License — sinta-se livre para usar, modificar e compartilhar.

---

> Feito com ❤️ por Marcos Cabanas Esteves
