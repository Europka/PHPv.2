<?php

namespace GeekBrains\LevelTwo\Blog;

class Post {
    public function __construct(
        public UUID $uuid,
        public UUID $authorUuid,
        public string $title,
        public string $text
    ){}

    public function __toString() {
        return "$this->title" . PHP_EOL . "$this->text" . PHP_EOL;
    }
    
    public function getUuid() :UUID {
        return $this->uuid;
    }

    public function setUuid(UUID $uuid) :void {
        $this->uuid = $uuid;
    }

    public function getAuthorUuid() :UUID {
        return $this->authorUuid;
    }

    public function setAuthorUuid(UUID $authorUuid) :void {
        $this->authorUuid = $authorUuid;
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