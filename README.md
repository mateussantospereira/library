# Biblioteca

Sistema simples de biblioteca feito com Laravel e MariaDB. Permite cadastrar livros, registrar empréstimos e devolvê-los. Um livro só pode ser emprestado se não tiver empréstimo em aberto.

## Funcionalidades

- CRUD de livros (listar, cadastrar, editar, excluir)
- Registro de empréstimo (livro + nome do leitor)
- Devolução de livros
- Status do livro: Disponível ou Emprestado

## Requisitos

- PHP 8.3 ou superior, com as extensões `mbstring`, `xml`, `curl`, `zip` e `pdo_mysql`
- Composer
- MariaDB (ou MySQL)

No Debian/Ubuntu:

```bash
sudo apt install -y php php-cli php-mbstring php-xml php-curl php-zip php-mysql \
                    mariadb-server composer unzip
sudo systemctl enable --now mariadb
```

## Como rodar

### 1. Clonar o repositório

```bash
git clone <URL_DO_REPOSITORIO> biblioteca
cd biblioteca
```

### 2. Instalar as dependências

```bash
composer install
```

### 3. Criar o banco de dados

```bash
sudo mariadb
```

```sql
CREATE DATABASE biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'biblioteca'@'localhost' IDENTIFIED BY 'troque_esta_senha';
GRANT ALL PRIVILEGES ON biblioteca.* TO 'biblioteca'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 4. Configurar o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Edite o `.env` e ajuste a conexão com o banco:

```
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca
DB_USERNAME=biblioteca
DB_PASSWORD=troque_esta_senha
```

Use `127.0.0.1` e não `localhost` no `DB_HOST`.

### 5. Criar as tabelas

```bash
php artisan migrate
```

### 6. Iniciar o servidor

```bash
php artisan serve
```

Acesse **http://127.0.0.1:8000**.

## Estrutura principal

```
app/Models/Livro.php
app/Models/Emprestimo.php
app/Http/Controllers/LivroController.php
app/Http/Controllers/EmprestimoController.php
database/migrations/
resources/views/livros/
resources/views/emprestimos/
routes/web.php
```

## Problemas comuns

| Erro                                               | Solução                                                                                             |
| -------------------------------------------------- | --------------------------------------------------------------------------------------------------- |
| `could not find driver`                            | Instale a extensão: `sudo apt install php-mysql` e reinicie o `php artisan serve`                   |
| `Connection refused`                               | O MariaDB não está rodando: `sudo systemctl start mariadb`                                          |
| `Access denied for user`                           | Usuário ou senha do `.env` não batem com o banco. Depois de editar, rode `php artisan config:clear` |
| `No application encryption key has been specified` | Rode `php artisan key:generate`                                                                     |
| `.env` não existe                                  | Rode `cp .env.example .env`                                                                         |

## Tecnologias

- Laravel
- MariaDB
- Blade (views)
