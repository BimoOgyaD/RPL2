<?php
// Simple front controller for MooHub
// Requires PHP 8.0+
declare(strict_types=1);

$basePath = __DIR__ . '/..';
require_once $basePath . '/app/Controllers/Home.php';
require_once $basePath . '/app/Controllers/News.php';

// parse routing via query params: ?route=news&action=edit&id=1
$route = $_GET['route'] ?? '';
$action = $_GET['action'] ?? 'index';

if ($route === 'news') {
    $controller = new \App\Controllers\News();
    // map actions
    switch ($action) {
        case 'detail':
            $id = intval($_GET['id'] ?? 0);
            $controller->detail($id);
            break;
        case 'create':
            $controller->create();
            break;
        case 'store':
            $controller->store();
            break;
        case 'edit':
            $id = intval($_GET['id'] ?? 0);
            $controller->edit($id);
            break;
        case 'update':
            $id = intval($_GET['id'] ?? 0);
            $controller->update($id);
            break;
        case 'delete':
            $id = intval($_GET['id'] ?? 0);
            $controller->delete($id);
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller = new \App\Controllers\Home();
    $controller->index();
}
