<?php 

use GeekBrains\LevelTwo\Blog\Exceptions\{CommandException};
use GeekBrains\LevelTwo\Blog\Commands\{Arguments,CreateUserCommand};
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\InMemoryUsersRepository;
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\SqliteUsersRepository;

require_once __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

$usersRepository = new SqliteUsersRepository($connection);
$command = new CreateUserCommand($usersRepository);

try {
    $command->handle(Arguments::fromArgv($argv));
} catch (CommandException $e) {
    $e->getMessage();
}