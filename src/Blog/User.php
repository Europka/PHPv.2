<?php

namespace GeekBrains\LevelTwo\Blog;

class User {
    public function __construct(
        private UUID $uuid,
        private string $username,
        private Name $name
    ){}

    public function __toString() {
        return "Пользователь $this->name с id $this->uuid";
    }

    public function uuid() :UUID {
        return $this->uuid;
    }

    public function setId(int $uuid) :void {
        $this->uuid = $uuid;
    }

    public function name() :Name {
        return $this->name;
    }

    public function setName(Name $name) :void {
        $this->name = $name;
    }

    public function username() :string {
        return $this->username;
    }
}