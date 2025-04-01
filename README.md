# 📚 Sistema de Gerenciamento de Biblioteca

## 📖 Sobre o Projeto

Este é um sistema simples de gerenciamento de biblioteca desenvolvido em **PHP** com **Bootstrap**. Ele permite que **bibliotecários** e **professores** façam cadastro, consulta de livros e pedidos.

## 🚀 Funcionalidades

✅ Login com dois tipos de usuários: **Bibliotecário** e **Professor**  
✅ Cadastro de livros  
✅ Cadastro de pedidos de livros  
✅ Listagem de livros cadastrados  
✅ Listagem de pedidos de livros    
✅ Interface responsiva utilizando **Bootstrap**

---

## 🛠️ Tecnologias Utilizadas

- **PHP** (Back-end)
- **HTML/CSS** (Estrutura e estilos)
- **Bootstrap** (Framework para estilização)
- **Sessões PHP** (Autenticação de usuário)
- **Arquivos TXT** (Para armazenamento de dados simples)

---

## 📂 Estrutura do Projeto
```
📂 projeto-biblioteca
│-- 📄 index.php              # Página de login
│-- 📄 bibliotecario.php      # Área do Bibliotecário
│-- 📄 professor.php          # Área do Professor
│-- 📄 cadastro.php           # Cadastro de livros
│-- 📄 cadastro_pedido.php    # Cadastro de pedidos de livros
│-- 📄 logout.php             # Finaliza a sessão
│-- 📄 naolog.php             # Página para Visitante
│-- 📄 pedidos.txt            # Armazena pedidos de livros
│-- 📄 dados_enviados.txt     # Armazena os livros cadastrados
│-- 📄 styles.css             # Estilos personalizados
```

---

## 🛠️ Como Rodar o Projeto
### 🔹 Pré-requisitos:
- Servidor local instalado (XAMPP)
- PHP 7.4+

### 🔹 Passo a Passo:
1️⃣ Clone este repositório:
```bash
git clone https://github.com/seuusuario/projeto-biblioteca.git
```

2️⃣ Coloque os arquivos dentro do diretório **htdocs** (se estiver usando XAMPP)

3️⃣ Inicie o servidor Apache e acesse no navegador:
```
http://localhost/projeto-biblioteca/index.php
```

4️⃣ Faça login com um dos seguintes usuários padrão:
   - **Bibliotecário:** biblio / biblio
   - **Professor:** professor / professor

---

## 🔧 Melhorias Futuras
🔹 Implementação de um banco de dados (MySQL) para maior robustez  
🔹 Melhor controle de permissões entre usuários  
🔹 Interface aprimorada com mais elementos gráficos  
🔹 Relatórios de pedidos e livros cadastrados

---

## 🤝 Contribuindo
Se quiser contribuir, sinta-se à vontade para enviar um **Pull Request** ou abrir uma **Issue**.
Toda ajuda é bem-vinda! 😊

📩 **Contato:** [r.lemesdemorais@gmail.com](mailto:r.lemesdemorais@gmail.com])

