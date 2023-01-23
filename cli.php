<?php 

use GeekBrains\LevelTwo\Blog\{Comment,Post,User};
use GeekBrains\LevelTwo\Blog\Exceptions\{AppException,UserNotFoundException};
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\{InMemoryUsersRepository,SqliteUsersRepository};
use GeekBrains\LevelTwo\Person\{Name,Person};

require_once __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

$usersRepository = new SqliteUsersRepository($connection);