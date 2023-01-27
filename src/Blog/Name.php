<?php

namespace GeekBrains\LevelTwo\Blog;

class Name
{
    private string $firstName;
    private string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function first() :string {
        return $this->firstName;
    }

    public function last() :string {
        return $this->lastName;
    }
}