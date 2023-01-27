<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\Exceptions\UserNotFoundException;
use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\UsersRepositoryInterface;

class InMemoryUsersRepository implements UsersRepositoryInterface {
    private array $users = [];

    public function save(User $user): void {
        $this->users[] = $user;
    }

    public function get(int $id): User {
        foreach ($this->users as $user) {
            if ($user->getId() === $id) {
                return $user;
            }
        }
        
        throw new UserNotFoundException("User not found: $id");
    }

    public function getByUsername(string $username) :User {
        foreach($this->users as $user) {
            if ($user->username() === $username) {
                return $user;
            }
        }   

        throw new UserNotFoundException("User not found: $username");
    }
}