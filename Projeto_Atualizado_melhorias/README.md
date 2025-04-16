# 📚 Sistema de Gerenciamento de Biblioteca

## 📖 Sobre o Projeto

Este é um sistema simples de gerenciamento de biblioteca desenvolvido em **PHP** com **Bootstrap**. Ele permite que **bibliotecários** e **professores** façam cadastro, consulta de livros e pedidos.

## 🚀 Funcionalidades

✅ Login com controle de sessão para **Bibliotecário** e **Professor**  
✅ Cadastro de **livros** diretamente no banco de dados  
✅ Cadastro de **pedidos de livros** por professores  
✅ Listagem de livros e pedidos salvos no **MySQL**  
✅ Interface responsiva com **Bootstrap**   
✅ Validação de formulários e exibição de mensagens de sucesso ou erro  
✅ Centralização e estilo visual aprimorado

---

## 🛠️ Tecnologias Utilizadas

- **PHP** (Back-end)
- **HTML/CSS** (Estrutura e estilos)
- **Bootstrap** (Framework para estilização)
- **Sessões PHP** (Autenticação de usuário)

---

## 📂 Estrutura do Projeto
```
📂 projeto-biblioteca
│-- 📄 index.php # Página de login 
│-- 📄 bibliotecario.php # Área do Bibliotecário 
│-- 📄 professor.php # Área do Professor 
│-- 📄 form_livro.php # Formulário de cadastro de livros 
│-- 📄 form_pedido.php # Formulário de cadastro de pedidos 
│-- 📄 lista_livros.php # Lista de livros cadastrados 
│-- 📄 lista_pedidos.php # Lista de pedidos realizados 
│-- 📄 dados_recebidos.php # Processamento dos pedidos 
│-- 📄 cadastrar_livro.php # Processamento dos livros 
│-- 📄 logout.php # Finaliza a sessão 
│-- 📄 naolog.php # Acesso negado / visitante 
│-- 📄 conexao.php # Conexão com o banco de dados

---

## 🛠️ Como Rodar o Projeto
### 🔹 Pré-requisitos:
- Servidor local instalado (XAMPP)
- PHP 7.4+
- MySQL/MariaDB ativo

### 🔹 Passo a Passo:
1️⃣ Clone este repositório:
```bash 
git clone https://github.com/seuusuario/projeto-biblioteca.git
```

2️⃣ Coloque os arquivos dentro do diretório **htdocs** (se estiver usando XAMPP)

3️⃣ Inicie o servidor Apache e acesse no navegador:
```
http://localhost/projeto-biblioteca/index.php

4️⃣Crie o banco de dados no phpMyAdmin:
```
5️⃣ Inicie o Apache e MySQL no XAMPP

6️⃣ Acesse no navegador:

http://localhost/projeto-biblioteca/index.php

7️⃣ Faça login com:

Bibliotecário: biblio / biblio

Professor: professor / professor


---

## 🔧 Melhorias Futuras
🔹 Upload de imagens de capas dos livros
🔹 Filtros e busca por nome, autor ou ISBN
🔹 Geração de relatórios PDF/Excel
🔹 Responsividade avançada para dispositivos móveis
🔹 Painel administrativo com gráficos

---

## 🤝 Contribuindo
Se quiser contribuir, sinta-se à vontade para enviar um **Pull Request** ou abrir uma **Issue**.
Toda ajuda é bem-vinda! 😊

📩 **Contato:** [r.lemesdemorais@gmail.com](mailto:r.lemesdemorais@gmail.com])

