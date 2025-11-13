# Netflix Clone - Laravel

Clone da interface do Netflix desenvolvido com Laravel, Docker, SCSS e jQuery.

## 🚀 Tecnologias

- Laravel 11
- PHP 8.2
- Docker & Docker Compose
- Nginx
- Vite
- SCSS
- jQuery

## 📋 Pré-requisitos

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Node.js](https://nodejs.org/) (v18 ou superior)
- [NPM](https://www.npmjs.com/) ou [Yarn](https://yarnpkg.com/)

## 🔧 Instalação

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd laravel-docker-app
```

### 2. Crie o arquivo .env

```bash
cp .env.example .env
```

> **Nota:** O arquivo `.env` é necessário para o Laravel funcionar, mas não precisa editar nada nele. O projeto não usa configurações customizadas.

### 3. Suba os containers Docker

```bash
docker compose up -d
```

### 4. Defina as permissões necessárias

```bash
docker compose exec app chmod -R 777 storage bootstrap/cache
```

### 5. Instale as dependências do Laravel

```bash
docker compose exec app composer install
```

### 6. Gere a chave da aplicação

```bash
docker compose exec app php artisan key:generate
```

### 7. Instale as dependências do Node.js

```bash
npm install
```

### 8. Compile os assets

Para desenvolvimento (com hot reload):
```bash
npm run dev
```

Para produção:
```bash
npm run build
```

## 🌐 Acessando a aplicação

Após seguir todos os passos, acesse:

```
http://localhost:8080
```

## 📁 Estrutura do Projeto

```
├── app/
│   ├── Http/Controllers/
│   │   └── NetflixController.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── components/
│   │   ├── netflix.blade.php
│   │   ├── filme.blade.php
│   │   └── pesquisa.blade.php
│   ├── scss/
│   │   ├── app.scss
│   │   └── components/
│   └── js/
│       ├── app.js
│       └── components/
├── public/
│   └── videos/
│       └── video.mp4
├── routes/
│   └── web.php
├── docker/
│   └── nginx/
│       └── default.conf
├── docker-compose.yml
└── Dockerfile
```

## 🎯 Funcionalidades

- ✅ Página inicial estilo Netflix
- ✅ Carrossel de filmes por categoria
- ✅ Sistema de busca
- ✅ Página de resultados de pesquisa
- ✅ Página individual do filme com vídeo background
- ✅ Design totalmente responsivo
- ✅ Dados mocados (não usa banco de dados)

## 🛠️ Comandos Úteis

### Parar os containers
```bash
docker compose down
```

### Ver logs dos containers
```bash
docker compose logs -f
```

### Acessar o container da aplicação
```bash
docker compose exec app bash
```


## 📝 Notas

- O projeto usa dados mocados no controller, **não utiliza banco de dados**
- O arquivo `.env` é necessário apenas para gerar a `APP_KEY` (criptografia do Laravel)
- Não é necessário editar nenhuma configuração no `.env`
- A porta padrão é 8080, pode ser alterada no `docker-compose.yml`
- Sessions e cache usam sistema de arquivos (não requer BD)
