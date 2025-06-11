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

CREATE TABLE configuracoes (
    chave VARCHAR(50) PRIMARY KEY,
    valor TEXT
);

-- Criando perfil de administrador:
INSERT INTO Alunos ( nome, email, administrador, senha) 
VALUES 
('Administrador', 'adm@educboard.com', 1, 'YWRt');

-- Texto default quando solicita inscrição dos alunos:
INSERT INTO configuracoes 
VALUES 
(
    'texto_padrao_para_inscricoes',
    'Cada aula tem 45 minutos de duração.
     Cada aluno terá direito a no máximo 4 aulas durante todo o curso, sendo as mesmas em dias distintos.
     Cada pessoa poderá marcar apenas um horário por dia. '
);

/*
Cada aluno terá direito a no máximo 4 aulas durante todo o curso, sendo as mesmas em dias distintos. </li>
     Cada pessoa poderá marcar apenas um horário por dia. 
     No máximo três alunos por horário, porque temos apenas três telescópios e três intrutores disponíveis.Procurem ser pontuais!
     Até o final das quatro aulas pretendemos que cada aluno consiga localizar sozinho os seguintes objetos astronômicos: Lua, planetas (Júpiter, Saturno, Marte e Vênus), aglomerados abertos, aglomerados globulares, nebulosas e sistemas múltiplos de estrelas.
      É de suma importância que antes das aulas os alunos instalem no celular o aplicativo Stellarium (ou similar)
    
