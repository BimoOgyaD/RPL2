MooHub - Lightweight CI4-like PHP project (runs on PHP 8.1)
----------------------------------------------------------
This project is a small, self-contained PHP app that mimics a CodeIgniter-like structure
so you can run it directly in XAMPP without installing the full CodeIgniter 4 framework.

How to run (XAMPP):
1. Extract moohub.zip into your XAMPP htdocs directory so you have: htdocs/moohub/
2. Import database.sql into phpMyAdmin (or run in MySQL): 
   - create database moohub_db and tables. The file database.sql is included.
3. Ensure PHP 8.1 is selected in XAMPP.
4. Open browser: http://localhost/moohub/public/
5. Use the News menu to add/edit/delete news.

Notes:
- DB config is read from .env at project root. Edit DB credentials if necessary.
- This is NOT the real CodeIgniter 4 framework. It's a minimal alternative that
  provides a model layer (PDO-based) so controllers don't write raw SQL directly,
  satisfying "ORM-like / less query" requirements for your ACT.
