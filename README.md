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
     ```
     http://localhost/educboard/
     ```
5. **Mude a senha do administrador**:
   - Ao executar o script na etapa 2 (criar_tabelas.sql) um usuário de administrador
     é criado com uma senha default. Favor alterar esta senha logo nesta etapa:
     e-mail: adm@educboard.com
     senha: adm

---

## 🤝 Contribuindo

Pull requests são bem-vindos! Para grandes mudanças, abra uma issue primeiro para discutirmos o que você quer modificar.

---

## 📄 Licença

MIT License — sinta-se livre para usar, modificar e compartilhar.

---

> Feito com ❤️ por Marcos Cabanas Esteves
