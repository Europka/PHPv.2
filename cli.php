<?php 

use GeekBrains\LevelTwo\Blog\{Comment,Name,Post,User,UUID};
use GeekBrains\LevelTwo\Blog\Exceptions\{AppException,UserNotFoundException};
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\{InMemoryUsersRepository,SqliteUsersRepository,UsersRepositoryInterface};
use GeekBrains\LevelTwo\Blog\Commands\CreateUserCommand;

require_once __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

$usersRepository = new SqliteUsersRepository($connection);

// $usersRepository->save(new User(UUID::random(), 'egorio1337', new Name('Egor', 'Kekov')));

echo $usersRepository->getByUsername('egorio1337');