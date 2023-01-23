<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\Person\Name;

class User {
    public function __construct(
        public int $id,
        public Name $name
    ){}

    public function __toString() {
        return "Пользователь $this->name с id $this->id";
    }

    public function getId() :int {
        return $this->id;
    }

    public function setId(int $id) :void {
        $this->id = $id;
    }

    public function name() :string {
        return $this->name;
    }

    public function setName(Name $name) :void {
        $this->name = $name;
    }
}