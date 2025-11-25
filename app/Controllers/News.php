<?php
namespace App\Controllers;
require_once __DIR__ . '/../Models/NewsModel.php';
use App\Models\NewsModel;

class News {
    protected $model;
    public function __construct(){
        $this->model = new NewsModel();
    }

    public function index(){
        $news = $this->model->all();
        $content = __DIR__ . '/../Views/news_list.php';
        include __DIR__ . '/../Views/layout.php';
    }

    public function detail($id){
        $news_item = $this->model->find($id);
        $content = __DIR__ . '/../Views/news_detail.php';
        include __DIR__ . '/../Views/layout.php';
    }

    public function create(){
        $news_item = null;
        $content = __DIR__ . '/../Views/news_form.php';
        include __DIR__ . '/../Views/layout.php';
    }

    public function store(){
        $title = $_POST['title'] ?? '';
        $content_txt = $_POST['content'] ?? '';
        $this->model->insert(['title'=>$title, 'content'=>$content_txt]);
        header('Location: /moohub/public/?route=news');
    }

    public function edit($id){
        $news_item = $this->model->find($id);
        $content = __DIR__ . '/../Views/news_form.php';
        include __DIR__ . '/../Views/layout.php';
    }

    public function update($id){
        $title = $_POST['title'] ?? '';
        $content_txt = $_POST['content'] ?? '';
        $this->model->update($id, ['title'=>$title, 'content'=>$content_txt]);
        header('Location: /moohub/public/?route=news');
    }

    public function delete($id){
        $this->model->delete($id);
        header('Location: /moohub/public/?route=news');
    }
}
