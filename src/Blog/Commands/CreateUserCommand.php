<?php

namespace GeekBrains\LevelTwo\Blog\Commands;

use GeekBrains\LevelTwo\Blog\{Name,User,UUID};
use GeekBrains\LevelTwo\Blog\Exceptions\{UserNotFoundException,CommandException};
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\UsersRepositoryInterface;

class CreateUserCommand {
    public function __construct(
        private UsersRepositoryInterface $usersRepository
    ){}

    public function handle(array $rawInput) :void {
        $input = $this->parseRawInput($rawInput);

        $username = $input['username'];

        if ($this->userExists($username)) {
            throw new CommandException("User already exists: $username");
        }
        
        $this->usersRepository->save(new User(
        UUID::random(),
        $username,
        new Name($input['first_name'], $input['last_name'])
        ));
    }

    private function parseRawInput(array $rawInput): array {
        $input = [];

        foreach ($rawInput as $argument) {
            $parts = explode('=', $argument);

            if (count($parts) !== 2) {
                continue;
            }
            $input[$parts[0]] = $parts[1];
        }

        foreach (['username', 'first_name', 'last_name'] as $argument) {
            if (!array_key_exists($argument, $input)) {
                throw new CommandException(
                    "No required argument provided: $argument"
                );
            }

            if (empty($input[$argument])) {
                throw new CommandException(
                    "Empty argument provided: $argument"
                );
            }
        }
        
        return $input;
    }

    private function userExists(string $username): bool {
        try {
            $this->usersRepository->getByUsername($username);
        } catch (UserNotFoundException) {
            return false;
        }

        return true;
    }
}
