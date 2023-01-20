<?php

namespace GeekBrains\LevelTwo\Blog;

class User {
    public function __construct(
        public int $id,
        public string $firstName,
        public string $lastName
    ){}

    public function __toString() {
        return "Пользователь $this->firstName $this->lastName с id $this->id";
    }

    public function getId() :int {
        return $this->id;
    }

    public function setId(int $id) :void {
        $this->id = $id;
    }

    public function getFirstName() :string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName) :void {
        $this->firstName = $firstName;
    }

    public function getLastName() :string {
        return $this->lastName;
    }

    public function setLastName(string $secondName) :void {
        $this->lastName = $lastName;
    }
}