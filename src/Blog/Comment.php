<?php

namespace GeekBrains\LevelTwo\Blog;

class Comment {
    public function __construct(
        public UUID $uuid,
        public UUID $authorUuid,
        public UUID $postUuid,
        public string $text
    ){}

    public function __toString() {
        return "$this->text" . PHP_EOL;
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

    public function getPostUuid() :UUID {
        return $this->postUuid;
    }

    public function setPostUuid(UUID $postUuid) :void {
        $this->postUuid = $postUuid;
    }

    public function getText() :string {
        return $this->text;
    }

    public function setText(string $text) :void {
        $this->text = $text;
    }
}