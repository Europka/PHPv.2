<?php

namespace GeekBrains\LevelTwo\Blog;

class Comment {
    public function __construct(
        public int $id,
        public int $idAuthor,
        public int $idPost,
        public string $text
    ){}

    public function __toString() {
        return "Комментарий №$this->id:" . PHP_EOL . "$this->text";
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

    public function setIdAuthor(string $idAuthor) :void {
        $this->idAuthor = $idAuthor;
    }

    public function getIdPost() :int {
        return $this->idPost;
    }

    public function setIdPost(int $idPost) :void {
        $this->idPost = $idPost;
    }

    public function getText() :string {
        return $this->text;
    }

    public function setText(string $text) :void {
        $this->text = $text;
    }
}