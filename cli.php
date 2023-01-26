<?php 

use GeekBrains\LevelTwo\Blog\Exceptions\{CommandException};
use GeekBrains\LevelTwo\Blog\Commands\{Arguments,CreateUserCommand};
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\{InMemoryUsersRepository,SqliteUsersRepository};
use GeekBrains\LevelTwo\Blog\{Post,UUID,Comment,User};
use GeekBrains\LevelTwo\Blog\Repositories\CommentsRepository\SqliteCommentsRepository;
use GeekBrains\LevelTwo\Blog\Repositories\PostsRepository\SqlitePostsRepository;

require_once __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

// CREATE TABLE posts (
//     uuid TEXT NOT NULL CONSTRAINT uuid_primary_key PRIMARY KEY,
//     user_uuid TEXT NOT NULL CONSTRAINT user_uuid_unique_key UNIQUE,
//     title TEXT NOT NULL,
//     text TEXT NOT NULL
// );

// CREATE TABLE comments (
//     uuid TEXT NOT NULL CONSTRAINT uuid_primary_key PRIMARY KEY,
//     post_uuid TEXT NOT NULL CONSTRAINT post_uuid_unique_key UNIQUE,
//     user_uuid TEXT NOT NULL CONSTRAINT user_uuid_unique_key UNIQUE,
//     text TEXT NOT NULL
// )

$usersRepository = new SqliteUsersRepository($connection);
// $command = new CreateUserCommand($usersRepository);

// try {
//     $command->handle(Arguments::fromArgv($argv));
// } catch (CommandException $e) {
//     echo $e->getMessage();
// }

$user = $usersRepository->getByUsername('egorio1337');

$postId = UUID::random();
$post = new Post(
    $postId,
    $user->uuid(),
    'Новый пост',
    'Здесь что-то умное написано, потому что ну а как иначе? Это же интернет'
);

$commentId = UUID::random();
$comment = new Comment(
    $commentId,
    $user->uuid(),
    $postId,
    'Полностью согласен с автором, он прав, ведь это же интернет'
);

$sqliteCommentsRepository = new SqliteCommentsRepository($connection);

