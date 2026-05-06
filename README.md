<p align="center">
  <img src="images/logo_letra.png" alt="GShase Logo" width="400" />
</p>

# GShase

**GShase** is a PHP and MySQL web platform designed for the search, visualization, publication review, and validation of academic articles and research documents.

The project includes a public search interface, user access pages, administrator tools, PDF document visualization, database integration, and an AI chatbot assistant powered through Botpress.

> [!NOTE]
> This project was developed as part of Hack Puebla 2024 focused on document discovery, research publication access, and institutional validation.

---

## Overview

**GShase** is a web application that helps users search for academic documents by title, author, publication year, and exclusion filters. It also includes an administrator panel where pending documents can be validated or deleted.

The platform includes:

- Home page with search access.
- User login page.
- User registration form.
- Search and filter page.
- Document visualization page.
- Admin dashboard.
- PDF document preview.
- Author information display.
- Document validation workflow.
- Document deletion workflow.
- Author deletion workflow.
- Botpress chatbot integration.
- MySQL database dump.
- Project documentation, mockups, and demo video.

> [!IMPORTANT]
> The project uses PHP with a MySQL/MariaDB database. It should be run through a local server environment such as XAMPP, WAMP, MAMP, or a configured Apache/PHP server.

---

## Main Purpose

The purpose of **GShase** is to create a platform for the **diffusion of high-impact articles and investigations**.

The system allows users to:

- Search for research documents.
- Filter results by author and publication year.
- Open and preview PDF documents.
- View author and institution information.
- Access an AI assistant.
- Submit or manage document-related information.
- Validate pending documents through an admin panel.

---

## Features

- PHP-based web application.
- MySQL/MariaDB database connection using PDO.
- Public document search engine.
- Search filters by:
  - Document title.
  - Author name.
  - Publication year.
  - Before / during / after year logic.
  - Excluded keywords.
- PDF document visualization.
- Author profile information.
- Institution information.
- Login system with PHP sessions.
- Admin dashboard.
- Pending document validation.
- Document deletion.
- Author and document deletion.
- Botpress webchat integration.
- Responsive-style custom CSS.
- Project documentation.
- UI mockups.
- Database dump included.
- Demo video included.

---

## Project Structure

```text
GShase-main/
│
├── access.php
├── adminPagina.php
├── busqueda.php
├── create.php
├── inicio.php
├── visualizacion.php
├── LICENSE
│
├── css/
│   └── style.css
│
├── database/
│   ├── database.php
│   ├── deleteAutor.php
│   ├── deleteDocumento.php
│   ├── login.php
│   ├── logout.php
│   ├── validateDocumento.php
│   └── viewpdf.php
│
├── documentacion/
│   ├── Diagrama de flujo IA.pdf
│   ├── GShase - Diagramas Proyecto - 4+1 & Base de Datos.pdf
│   ├── Video de Hackhaton 2.mp4
│   └── mockups/
│       ├── Admin.pdf
│       ├── Login.pdf
│       ├── buscar.pdf
│       ├── createUser.pdf
│       ├── feed_usuario.pdf
│       ├── inicio.pdf
│       └── visualizacion.pdf
│
├── images/
│   ├── ask.png
│   ├── logo.png
│   ├── logo_letra.png
│   ├── test.png
│   ├── usuario_default.png
│   └── welcome_image.png
│
├── scripts/
│   ├── chatbot.js
│   └── create.js
│
└── sql/
    └── hackaton_2024.sql
```

---

## File Description

| File | Description |
|---|---|
| `inicio.php` | Main homepage with welcome message, login/register buttons, search bar, and chatbot button. |
| `access.php` | Login page for user access. |
| `create.php` | User creation / registration form. |
| `busqueda.php` | Search page with filters and document result listing. |
| `visualizacion.php` | Document visualization page with PDF preview and author information. |
| `adminPagina.php` | Admin panel for reviewing pending documents. |
| `database/database.php` | PDO database connection class. |
| `database/login.php` | Login validation logic. |
| `database/logout.php` | Session logout logic. |
| `database/validateDocumento.php` | Marks a document as validated. |
| `database/deleteDocumento.php` | Deletes a document from the database. |
| `database/deleteAutor.php` | Deletes an author and their associated documents. |
| `database/viewpdf.php` | Retrieves and displays a PDF stored as a BLOB in the database. |
| `scripts/chatbot.js` | Opens the Botpress webchat. |
| `scripts/create.js` | Handles registration-form validation and institution-selection behavior. |
| `css/style.css` | Main stylesheet for the platform. |
| `sql/hackaton_2024.sql` | MySQL/MariaDB database dump. |
| `LICENSE` | Project license file. |

---

## Requirements

To run this project locally, you need:

- PHP
- MySQL or MariaDB
- Apache or another PHP-compatible web server
- phpMyAdmin, recommended
- A browser
- Internet access for Botpress chatbot scripts

Recommended local environments:

- XAMPP
- WAMP
- MAMP
- Laragon
- Native Apache + PHP + MySQL setup

The SQL dump was generated with:

```text
MariaDB 10.4.32
PHP 8.1.25
phpMyAdmin 5.2.1
```

> [!TIP]
> XAMPP is probably the easiest way to run this project locally because it includes Apache, PHP, MySQL/MariaDB, and phpMyAdmin.

---

## Database

The project uses a database named:

```text
hackaton_2024
```

The database dump is located at:

```text
sql/hackaton_2024.sql
```

The database includes tables such as:

| Table | Purpose |
|---|---|
| `admininstitucional` | Stores institutional admin credentials. |
| `adminpagina` | Stores page admin credentials. |
| `autor` | Stores author information. |
| `biblioteca` | Stores document metadata and PDF BLOB data. |
| `búsqueda` | Stores user search-related data. |
| `institucion` | Stores institution information. |
| `seguimiento` | Stores user-author follow relationships. |
| `usuario` | Stores user account information. |

> [!IMPORTANT]
> The PHP connection file expects the database name to be `hackaton_2024`.

---

## Database Configuration

The database connection is configured in:

```text
database/database.php
```

Default configuration:

```php
private static $dbName = 'hackaton_2024';
private static $dbHost = 'localhost';
private static $dbUsername = 'root';
private static $dbUserPassword = '';
```

If your local server uses different credentials, update these values.

Example:

```php
private static $dbName = 'hackaton_2024';
private static $dbHost = 'localhost';
private static $dbUsername = 'root';
private static $dbUserPassword = 'your_password';
```

> [!WARNING]
> Do not use root credentials with an empty password in production. This configuration is only acceptable for local testing.

---

## Installation

Clone the repository:

```bash
git clone https://github.com/YOUR-USERNAME/GShase.git
```

Move the project folder into your local server directory.

For XAMPP on Windows, place it inside:

```text
C:/xampp/htdocs/
```

For XAMPP on macOS, place it inside:

```text
/Applications/XAMPP/htdocs/
```

Start Apache and MySQL from XAMPP.

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a database named:

```text
hackaton_2024
```

Import the SQL dump:

```text
sql/hackaton_2024.sql
```

Open the project in your browser:

```text
http://localhost/GShase-main/inicio.php
```

> [!TIP]
> If your folder name is different, update the URL to match your local folder name.

---

## How to Run

1. Start Apache.
2. Start MySQL/MariaDB.
3. Import `sql/hackaton_2024.sql`.
4. Verify the database credentials in `database/database.php`.
5. Open:

```text
http://localhost/GShase-main/inicio.php
```

6. Use the search bar or navigate through the platform.

---

## Main Pages

### Homepage

```text
inicio.php
```

The homepage includes:

- GShase header.
- Welcome section.
- Login button.
- Registration button.
- Search bar.
- Chatbot access button.

---

### Login Page

```text
access.php
```

The login page includes:

- Username field.
- Password field.
- Login button.
- Link to create a new account.

The form sends data to:

```text
database/login.php
```

---

### Registration Page

```text
create.php
```

The registration page includes fields for:

- Full name.
- Academic title.
- Specialty.
- Email.
- Institution.
- Password.
- Password confirmation.
- First document upload.

The form uses JavaScript validation from:

```text
scripts/create.js
```

> [!WARNING]
> The current registration form validates input on the frontend, but the backend submission flow may need further implementation before it can fully create new users and upload documents into the database.

---

### Search Page

```text
busqueda.php
```

The search page allows users to search and filter documents.

Available filters:

| Filter | Description |
|---|---|
| Search | Searches by document title. |
| Author | Filters by author full name. |
| Publication year | Filters by document year. |
| Before | Shows documents published before a selected year. |
| During | Shows documents published during a selected year. |
| After | Shows documents published after a selected year. |
| Exclude | Excludes documents containing a keyword in the title. |

---

### Document Visualization Page

```text
visualizacion.php
```

The visualization page displays:

- Embedded PDF preview.
- Author full name.
- Author specialty.
- Institution.
- List of author articles.
- Button to return to search.
- AI chatbot button.

PDF files are loaded through:

```text
database/viewpdf.php
```

---

### Admin Page

```text
adminPagina.php
```

The admin page displays pending documents.

Administrators can:

- View pending documents.
- Validate documents.
- Delete documents.
- Delete an author and their documents.
- Close session.

Document validation uses:

```text
database/validateDocumento.php
```

Document deletion uses:

```text
database/deleteDocumento.php
```

Author deletion uses:

```text
database/deleteAutor.php
```

> [!IMPORTANT]
> The admin page is protected with PHP sessions. Users who are not logged in are redirected to `access.php`.

---

## AI Chatbot

The project includes a Botpress webchat integration.

Used files:

```text
scripts/chatbot.js
```

External scripts:

```html
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/9ec69e47-15e3-4a90-bb27-6a418d01d343/webchat/config.js" defer></script>
```

The chatbot can be opened using the fixed button:

```text
¡Chatea conmigo!
```

> [!NOTE]
> The chatbot requires internet access because it loads Botpress scripts from external URLs.

---

## UI and Assets

The project includes several visual assets:

| Asset | Description |
|---|---|
| `images/logo.png` | Main icon used for the search bar and chatbot button. |
| `images/logo_letra.png` | Full GShase logo with text. |
| `images/welcome_image.png` | Homepage welcome illustration. |
| `images/usuario_default.png` | Default user profile image. |
| `images/ask.png` | Chatbot or assistant-related visual asset. |
| `images/test.png` | Large visual test asset included in the repository. |

---

## Documentation

The project includes documentation and design materials inside:

```text
documentacion/
```

Files included:

| File | Description |
|---|---|
| `Diagrama de flujo IA.pdf` | AI flow diagram. |
| `GShase - Diagramas Proyecto - 4+1 & Base de Datos.pdf` | Project architecture and database diagrams. |
| `Video de Hackhaton 2.mp4` | Demo or presentation video for the hackathon project. |

Mockups included:

```text
documentacion/mockups/
```

| Mockup | Description |
|---|---|
| `Admin.pdf` | Admin page mockup. |
| `Login.pdf` | Login page mockup. |
| `buscar.pdf` | Search page mockup. |
| `createUser.pdf` | User creation page mockup. |
| `feed_usuario.pdf` | User feed mockup. |
| `inicio.pdf` | Homepage mockup. |
| `visualizacion.pdf` | Document visualization page mockup. |

> [!TIP]
> These documents are useful for understanding the intended system architecture, database model, UI flow, and design process.

---

## Main Database Workflow

The system follows this basic workflow:

```text
User searches for a document
        ↓
busqueda.php queries the database
        ↓
Matching documents are displayed
        ↓
User opens a document result
        ↓
visualizacion.php loads metadata
        ↓
viewpdf.php displays the PDF BLOB
```

Admin workflow:

```text
Admin logs in
        ↓
adminPagina.php loads pending documents
        ↓
Admin validates or deletes documents
        ↓
Database is updated
```

---

## Security Notes

This project is suitable for local academic demonstration, but it should be improved before production use.

Important security concerns:

- Passwords appear to be stored without hashing.
- Database credentials are hardcoded.
- User registration backend needs further implementation.
- File upload handling should be validated and secured.
- Admin and user roles should be separated more clearly.
- External chatbot scripts should be reviewed.
- PDF BLOB output should be carefully validated.
- Session management should be hardened.
- Input sanitization should be reviewed across all forms.

> [!CAUTION]
> Do not deploy this project publicly without improving authentication, password hashing, upload validation, authorization checks, and database security.

---

## Known Issues

### Database and login field mismatch

The SQL dump defines the `usuario` table with columns such as:

```text
idUsuario
Usuario
Contrasenia
Nombre
email
```

However, `database/login.php` expects fields such as:

```text
user_name
password
name
id
```

This may cause login errors unless the database schema or PHP code is adjusted.

Recommended fix:

```text
Either update login.php to match the SQL dump, or update the SQL table column names to match login.php.
```

---

### Registration form does not fully create a user

The registration page includes frontend validation, but the form action currently points to:

```text
database/login.php
```

This means the registration page may not actually insert new user or document records into the database.

Recommended improvement:

```text
Create a dedicated database/createUser.php or database/register.php file to handle new user registration and document upload.
```

---

### Botpress depends on external scripts

The chatbot will not load if:

- There is no internet connection.
- Botpress services are unavailable.
- The configured Botpress bot is removed or disabled.

---

### PDF files are stored as database BLOBs

The project displays PDFs from the database.

This works for demonstration, but for larger production systems, it may be better to store PDF files on the server filesystem or cloud storage and save only metadata and file paths in the database.

---

## Troubleshooting

### Database connection fails

Check the configuration in:

```text
database/database.php
```

Make sure:

- MySQL/MariaDB is running.
- The database `hackaton_2024` exists.
- The username and password are correct.
- The SQL dump was imported successfully.

---

### Page shows a blank screen

Enable PHP errors during local development.

In `php.ini`, check:

```ini
display_errors = On
error_reporting = E_ALL
```

Restart Apache after editing `php.ini`.

---

### Login does not work

Check the database column mismatch described in **Known Issues**.

Also verify:

- The correct database is imported.
- The `usuario` table has valid users.
- The PHP code uses the same column names as the SQL schema.
- Sessions are enabled in PHP.

---

### Search returns no results

Check that:

- The `biblioteca` table contains records.
- The `autor` table contains matching authors.
- `biblioteca.idAutor` correctly references `autor.idAutor`.
- The search terms match document titles.
- Filters are not too restrictive.

---

### PDF preview does not load

Check that:

- The selected document exists.
- The `Documento` column contains valid PDF BLOB data.
- `database/viewpdf.php` receives a valid `id`.
- The browser supports embedded PDF preview.

---

### Chatbot does not open

Check that:

- You have internet access.
- Botpress scripts load correctly.
- The browser console does not show Botpress-related errors.
- `scripts/chatbot.js` is loaded correctly.

---

### CSS or images do not load

Make sure the project is being accessed through a local server, not opened directly as a file.

Correct:

```text
http://localhost/GShase-main/inicio.php
```

Incorrect:

```text
file:///C:/xampp/htdocs/GShase-main/inicio.php
```

---

## Possible Improvements

Future versions could include:

- Dedicated registration backend.
- Password hashing with `password_hash()`.
- Password verification with `password_verify()`.
- Cleaner role system for users, authors, institutions, and admins.
- Better login schema consistency.
- PDF upload validation.
- File-size limits.
- CSRF protection.
- More robust session management.
- Pagination for search results.
- Better responsive design.
- Search by article category or research field.
- Full-text search.
- Better document approval workflow.
- Admin audit logs.
- User profile page.
- Author profile page.
- Institution dashboard.
- Improved chatbot training and flow.
- Environment-based database configuration.
- Docker setup.
- Deployment guide.

---

## License

This project includes a **CC0 1.0 Universal** license.

See the `LICENSE` file for details.

> [!IMPORTANT]
> Even when the repository uses CC0, external services, third-party assets, Botpress configurations, documentation, and institutional content should still be reviewed before reuse or publication.

---

## Disclaimer

This project is an academic and hackathon-style prototype.

It is not production-ready without additional improvements to authentication, database design, security, file upload handling, and deployment configuration.

> [!CAUTION]
> Do not use this project with real user data, private documents, or production credentials without a full security review.
