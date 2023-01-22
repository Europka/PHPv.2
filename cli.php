<?php 

use GeekBrains\LevelTwo\Blog\{Comment,Post,User};
use GeekBrains\LevelTwo\Blog\Exceptions\{AppException,UserNotFoundException};
use GeekBrains\LevelTwo\Blog\Repositories\UsersInMemoryRepository;

// spl_autoload_register(function ($class) {
//     $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//     $file = str_replace('_', DIRECTORY_SEPARATOR, $file);

//     if (file_exists($file)) {
//         require $file;
//     }
// });

require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('ru_RU');

$text = $faker->realText(rand(150,200));
$title = $faker->realText(rand(30,50));

$gender = rand(0,1) ? 'male' : 'female';
$firstName = $faker->firstName($gender);
$lastName = $faker->lastName($gender);

$user = new User(
    1,
    $firstName,
    $lastName
);

try {
    $repository = new UsersInMemoryRepository();
    $repository->save($user);
} catch (AppException $e) {
    $e->getMessage();
}

// try {
//     echo $repository->get(1);
// } catch (UserNotFoundException $e) {
//     echo $e->getMessage();
// }

$post = new Post(
    1,
    $user->getId(),
    $title,
    $text
);

$commentText = $faker->realText(rand(70,100));

$comment = new Comment(
    1,
    $user->getId(),
    $post->getId(),
    $commentText
);

try {
    if (isset($argv[1])) {
        $arg = $argv[1];
    
        if (isset($$arg)) {
            echo $$arg;
        } else {
            throw new AppException('Аргументы запуска приложения указаны неверно');
        }
    } else {
        throw new AppException('Приложение запущено без аргументов');
    }
} catch (AppException $e) {
    echo $e->getMessage();
}