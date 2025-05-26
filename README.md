# Sistema de Gerenciamento de Biblioteca

## 📚 Visão Geral
Este projeto é um sistema completo de gerenciamento de biblioteca desenvolvido em Java com Spring Boot, permitindo o cadastro, consulta, empréstimo e devolução de livros, além do gerenciamento de usuários.

## 🛠️ Tecnologias Utilizadas
- **Java**: Linguagem de programação principal
- **Spring Boot**: Framework para desenvolvimento de aplicações Java
- **Spring MVC**: Para implementação do padrão MVC
- **Thymeleaf**: Motor de templates para renderização de páginas HTML
- **Spring Data JPA**: Para persistência de dados
- **H2 Database**: Banco de dados em memória para desenvolvimento
- **Bootstrap**: Framework CSS para estilização das páginas

## 🏗️ Arquitetura MVC
Este projeto segue o padrão de arquitetura Model-View-Controller (MVC), que divide a aplicação em três componentes principais:

### Model (Modelo)
- Representa os dados e a lógica de negócios da aplicação
- Inclui as entidades (`Usuario`, `Livro`, `Emprestimo`, etc.)
- Responsável pela validação dos dados e regras de negócio
- Exemplos no projeto: classes em `/src/main/java/com/biblioteca/models/`

### View (Visão)
- Responsável pela interface com o usuário
- No projeto, são os templates Thymeleaf que renderizam as páginas HTML
- Exibe os dados ao usuário e envia as ações do usuário para o Controller
- Exemplos no projeto: arquivos em `/src/main/resources/templates/`

### Controller (Controlador)
- Intermediário entre o Model e a View
- Recebe as requisições do usuário, processa-as e retorna respostas
- Coordena o fluxo de dados entre o Model e a View
- Exemplos no projeto: classes em `/src/main/java/com/biblioteca/controllers/`

## 🔄 Fluxo de Funcionamento no Padrão MVC
1. O usuário interage com a interface (View) fazendo uma solicitação
2. O Controller recebe a solicitação e a processa
3. O Controller se comunica com o Model para obter ou atualizar dados
4. O Model executa a lógica de negócios e retorna os resultados ao Controller
5. O Controller seleciona a View apropriada e passa os dados necessários
6. A View renderiza a interface com os dados recebidos e a apresenta ao usuário

## 📂 Estrutura do Projeto
```
biblioteca-main/
├── src/
│   ├── main/
│   │   ├── java/
│   │   │   └── com/
│   │   │       └── biblioteca/
│   │   │           ├── controllers/     # Controladores da aplicação
│   │   │           ├── models/          # Modelos/entidades
│   │   │           ├── repositories/    # Interfaces para acesso ao banco de dados
│   │   │           ├── services/        # Serviços com lógica de negócio
│   │   │           └── BibliotecaApplication.java  # Classe principal
│   │   ├── resources/
│   │   │   ├── static/                  # Recursos estáticos (CSS, JS, imagens)
│   │   │   ├── templates/               # Templates Thymeleaf (HTML)
│   │   │   └── application.properties   # Configurações da aplicação
│   └── test/                            # Testes automatizados
├── pom.xml                              # Configuração do Maven
└── README.md                            # Este arquivo
```

## 🚀 Como Executar o Projeto

### Pré-requisitos
- Java JDK 11 ou superior
- Maven

### Passos para Execução
1. Clone o repositório:
   ```bash
   git clone https://github.com/YasminPelaquim/biblioteca-main.git
   ```

2. Navegue até a pasta do projeto:
   ```bash
   cd biblioteca-main
   ```

3. Compile e execute o projeto:
   ```bash
   mvn spring-boot:run
   ```

4. Acesse a aplicação no navegador:
   ```
   http://localhost:8080
   ```

## 📝 Funcionalidades Principais

### Gerenciamento de Livros
- Cadastro de novos livros
- Edição de informações de livros
- Listagem e busca de livros
- Exclusão de livros

### Gerenciamento de Usuários
- Cadastro de novos usuários
- Edição de dados de usuários
- Listagem e busca de usuários
- Exclusão de usuários

### Empréstimos e Devoluções
- Registro de empréstimos de livros
- Controle de data de empréstimo e devolução
- Registro de devoluções
- Visualização do histórico de empréstimos

## 🔧 Configuração do Banco de Dados
O projeto utiliza o H2 Database para desenvolvimento, configurado automaticamente pelo Spring Boot. Para configurar outro banco de dados, modifique o arquivo `application.properties`.

## 👥 Contribuição
Para contribuir com este projeto:
1. Faça um fork do repositório
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`)
3. Faça commit das alterações (`git commit -m 'Adiciona nova feature'`)
4. Envie para o branch (`git push origin feature/nova-feature`)
5. Abra um Pull Request

## 📄 Licença
Este projeto está licenciado sob a licença MIT - veja o arquivo LICENSE para detalhes.
