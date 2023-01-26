<?php

namespace GeekBrains\LevelTwo\Blog;

class Post {
    public function __construct(
        public UUID $uuid,
        public UUID $uuidAuthor,
        public string $title,
        public string $text
    ){}

    public function __toString() {
        return "$this->title" . PHP_EOL . "$this->text";
    }
    
    public function getUuid() :UUID {
        return $this->UUID;
    }

    public function setUuid(UUID $uuid) :void {
        $this->uuid = $uuid;
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