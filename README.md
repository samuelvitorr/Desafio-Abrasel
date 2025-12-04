<p align="center">👋 Hey! I'm Samuel Vitor, a Brazilian programmer.</p>
<p align="center">
    <a href="https://twitter.com/samuell_vitoorr"><img src="https://img.shields.io/badge/X-742273?style=for-the-badge&logoColor=F2F2F2&logo=twitter"/></a>
    <a href="https://www.linkedin.com/in/samuel-vitor-362713214?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><img src="https://img.shields.io/badge/linkedin-742273?style=for-the-badge&logoColor=F2F2F2&logo=linkedin"/></a>
    <a href="https://www.instagram.com/samuell_vitoorr?igsh=MXc0ZXViZGxuNWR3eA=="><img src="https://img.shields.io/badge/instagram-742273?style=for-the-badge&logoColor=F2F2F2&logo=instagram"/></a>
</p>
<img src="https://github.com/AnderMendoza/AnderMendoza/raw/main/assets/line-neon.gif" width="100%">

# **Sistema de Gestão de Pessoas - Full Stack**

:link: Sistema completo de CRUD (Create, Read, Update, Delete) para gerenciamento de pessoas.

:art: Interface moderna estilizada com o tema **Catppuccin Mocha** (Dark Mode).

:whale: Ambiente de desenvolvimento totalmente containerizado com **Docker**.

:arrows_counterclockwise: Comunicação assíncrona entre Frontend e Backend via Fetch API.

## Tecnologias Usadas
<details>
  <summary>📚 Técnologias usadas</summary>
    <div>
      <samp>
        <p align="center">
          <img src="https://img.shields.io/badge/PHP-1e1e2e?&style=for-the-badge&logo=php&logoColor=cba6f7"/>
          <img src="https://img.shields.io/badge/MySQL-1e1e2e?&style=for-the-badge&logo=mysql&logoColor=cba6f7"/>
          <img src="https://img.shields.io/badge/Docker-1e1e2e?&style=for-the-badge&logo=docker&logoColor=cba6f7"/> 
          <br>
          <img src="https://img.shields.io/badge/HTML5-1e1e2e?&style=for-the-badge&logo=html5&logoColor=cba6f7"/>
          <img src="https://img.shields.io/badge/CSS3-1e1e2e?&style=for-the-badge&logo=css3&logoColor=cba6f7"/>
          <img src="https://img.shields.io/badge/JavaScript-1e1e2e?&style=for-the-badge&logo=javascript&logoColor=cba6f7"/>
        </p>
      </samp>
    </div>
</details>
  
  
<img src="https://github.com/AnderMendoza/AnderMendoza/raw/main/assets/line-neon.gif" width="100%">

## Metodologia

O sistema foi desenhado para ser leve e eficiente. O backend em **PHP** funciona como uma API RESTful simples, recebendo e enviando JSON. O frontend consome esses dados dinamicamente sem recarregar a página (SPA - Single Page Application logic).
A Persistência de dados é garantida através de um container **MySQL**, orquestrado via Docker Compose para fácil setup.

<img src="https://github.com/AnderMendoza/AnderMendoza/raw/main/assets/line-neon.gif" width="100%">

## Estrutura do Projeto

```bash
projeto/
├─ docker-compose.yml       # Arquivo para orquestração dos containers PHP e MySQL
├─ Dockerfile               # Imagem customizada PHP
├─ criar_tabela.sql         # Script para criação da tabela 'pessoas'
└─ api/
   ├─ pessoas.php           # API RESTful em PHP (GET, POST, PUT, DELETE)
   ├─ index.html            # Frontend (formulário + listagem)
   ├─ style.css             # Estilos CSS com esquema Catppuccin
   └─ script.js             # Script JS para Fetch API e manipulação DOM
```

<img src="https://github.com/AnderMendoza/AnderMendoza/raw/main/assets/line-neon.gif" width="100%">


## Requisitos

- Docker e Docker Compose instalados

## Como rodar

1. Clone o repositório
2. Na pasta raiz, execute:
```bash
    docker compose up --build
```
3. Aguarde os containers subirem e o MySQL inicializar (criar tabela)
4. Acesse no navegador: **http://localhost:8000**

## API Endpoints

- `GET /api/pessoas.php` - lista todas pessoas
- `POST /api/pessoas.php` - cria pessoa (JSON no corpo)
- `PUT /api/pessoas.php` - atualiza pessoa (JSON no corpo)
- `DELETE /api/pessoas.php` - deleta pessoa (id no corpo)

* Exemplo de JSON para envio (POST/PUT):
```bash
  {
    "nome": "Samuel Vitor",
    "cpf": "111.222.333-44",
    "idade": 25
  }
```

<img src="https://github.com/AnderMendoza/AnderMendoza/raw/main/assets/line-neon.gif" width="100%">
<img src="https://github.com/AnderMendoza/AnderMendoza/raw/main/assets/banner-header.gif">
