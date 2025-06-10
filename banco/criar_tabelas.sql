-- Tabela: Alunos
CREATE TABLE Alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255),
    cpf VARCHAR(20),
    telefone VARCHAR(50),
    profissao VARCHAR(100),
    curso VARCHAR(100),
    periodo VARCHAR(20),
    administrador INT,
    senha VARCHAR(255)
);

-- Tabela: Professores
CREATE TABLE Professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    telefone VARCHAR(20),
    cpf VARCHAR(14),
    email VARCHAR(255)
);


-- Tabela: Turma
CREATE TABLE Turma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE,
    horario VARCHAR(50),
    vagasmax INT,
    local VARCHAR(255),
    professor1 INT,
    professor2 INT,
    professor3 INT,
    FOREIGN KEY (professor1) REFERENCES Professores(id),
    FOREIGN KEY (professor2) REFERENCES Professores(id),
    FOREIGN KEY (professor3) REFERENCES Professores(id)
);

-- Tabela de vínculo: Turma ↔ Alunos
CREATE TABLE vinculo_turma_alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT,
    turma_id INT,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id),
    FOREIGN KEY (turma_id) REFERENCES Turma(id)
);

-- Tabela de vínculo: Turma ↔ Professor
CREATE TABLE vinculo_turma_professor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professor_id INT,
    turma_id INT,
    FOREIGN KEY (professor_id) REFERENCES Professores(id),
    FOREIGN KEY (turma_id) REFERENCES Turma(id)
);

-- Criando perfil de administrador:
INSERT INTO Alunos ( nome, email, administrador, senha) 
VALUES 
('Administrador', 'adm@educboard.com', 1, 'YWRt');
