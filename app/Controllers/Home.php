<?php
namespace App\Controllers;
class Home {
    public function index() {
        $title = 'MooHub - Biodata Perusahaan';
        include __DIR__ . '/../Views/layout.php';
    }
}
