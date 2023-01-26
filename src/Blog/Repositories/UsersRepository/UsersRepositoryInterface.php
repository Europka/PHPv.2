<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\{User,UUID};

interface UsersRepositoryInterface {
    public function get(UUID $uuid) :User;
    public function save(User $user) :void;
    public function getByUsername(string $username): User;
}