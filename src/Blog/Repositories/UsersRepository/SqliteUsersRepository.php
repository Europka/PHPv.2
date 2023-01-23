<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\User;

class SqliteUsersRepository {
    public function __construct (
        private \PDO $connection
    ){}

    public function save(User $user): void
    {
        
    }
}
