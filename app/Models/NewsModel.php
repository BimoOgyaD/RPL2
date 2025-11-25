<?php
namespace App\Models;
require_once __DIR__ . '/Database.php';

class NewsModel extends Database {
    protected $table = 'news';

    public function all() {
        $stmt = $this->pdo()->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->pdo()->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insert($data) {
        $stmt = $this->pdo()->prepare("INSERT INTO {$this->table} (title, content) VALUES (:title, :content)");
        return $stmt->execute(['title'=>$data['title'], 'content'=>$data['content']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo()->prepare("UPDATE {$this->table} SET title = :title, content = :content WHERE id = :id");
        return $stmt->execute(['title'=>$data['title'], 'content'=>$data['content'], 'id'=>$id]);
    }

    public function delete($id) {
        $stmt = $this->pdo()->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id'=>$id]);
    }
}
