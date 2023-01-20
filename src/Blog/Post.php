<?php

namespace GeekBrains\LevelTwo\Blog;

class Post {
    public function __construct(
        public int $id,
        public int $idAuthor,
        public string $title,
        public string $text
    ){}

    public function __toString() {
        return "Пост №$this->id " . PHP_EOL . "$this->title" . PHP_EOL . "$this->text";
    }
    
    public function getId() :int {
        return $this->id;
    }

    public function setId(int $id) :void {
        $this->id = $id;
    }

    public function getIdAuthor() :int {
        return $this->idAuthor;
    }

    public function setIdAuthor(int $idAuthor) :void {
        $this->idAuthor = $idAuthor;
    }

    public function getTitle() :string {
        return $this->title;
    }

    public function setTitle(string $title) :void {
        $this->title = $title;
    }

    public function getText() :string {
        return $this->text;
    }

    public function setText(string $text) :void {
        $this->text = $text;
    }
}