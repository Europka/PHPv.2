<?php 

use GeekBrains\LevelTwo\Blog\Exceptions\{CommandException,CommentNotFoundException};
use GeekBrains\LevelTwo\Blog\Commands\{Arguments,CreateUserCommand};
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\{InMemoryUsersRepository,SqliteUsersRepository};
use GeekBrains\LevelTwo\Blog\{Post,UUID,Comment,User};
use GeekBrains\LevelTwo\Blog\Repositories\CommentsRepository\SqliteCommentsRepository;
use GeekBrains\LevelTwo\Blog\Repositories\PostsRepository\SqlitePostsRepository;

require_once __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

// CREATE TABLE posts (
//     uuid TEXT NOT NULL CONSTRAINT uuid_primary_key PRIMARY KEY,
//     user_uuid TEXT NOT NULL,
//     title TEXT NOT NULL,
//     text TEXT NOT NULL
// )

// CREATE TABLE comments (
//     uuid TEXT NOT NULL CONSTRAINT uuid_primary_key PRIMARY KEY,
//     post_uuid TEXT NOT NULL,
//     user_uuid TEXT NOT NULL,
//     text TEXT NOT NULL
// )

// $command = new CreateUserCommand($usersRepository);

// try {
//     $command->handle(Arguments::fromArgv($argv));
// } catch (CommandException $e) {
//     echo $e->getMessage();
// }

$usersRepository = new SqliteUsersRepository($connection);
$user = $usersRepository->getByUsername('egorio1337');

$postId = UUID::random();
$post = new Post(
    $postId,
    $user->uuid(),
    'Мой второй пост',
    'Здесь что-то не настолько умное, как в первом посте (потому что автор исписался), но всё еще я прав, потому что ну а как же? Это же интернет'
);

$commentId = UUID::random();
$comment = new Comment(
    $commentId,
    $user->uuid(),
    $postId,
    'Полностью согласен с автором! Он прав, это же интернет!'
);

$sqliteCommentsRepository = new SqliteCommentsRepository($connection);
$sqlitePostsRepository = new SqlitePostsRepository($connection);

// try {
//     $userPosts = $sqlitePostsRepository->getByUserUuid($user->uuid());

//     foreach($userPosts as $userPost) {
//         echo $userPost;
//     }
// } catch (PostNotFoundException $e) {
//     echo $e->getMessage();
// }

// try {
//     echo $sqliteCommentsRepository->get(new UUID('89385a88-3e13-41bb-916c-a152c410a3d0'));
// } catch (CommentNotFoundException $e) {
//     echo $e->getMessage();
// }

try {
    $userComments = $sqliteCommentsRepository->getByUserUuid($user->uuid());

    foreach($userComments as $userComment) {
        echo $userComment;
    }
} catch (CommentNotFoundException $e) {
    echo $e->getMessage();
}