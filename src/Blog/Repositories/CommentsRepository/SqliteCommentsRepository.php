<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\CommentsRepository;

use GeekBrains\LevelTwo\Blog\{Comment,UUID};
use GeekBrains\LevelTwo\Blog\Exceptions\UserNotFoundException;
use GeekBrains\LevelTwo\Blog\Repositories\CommentsRepository\CommentsRepositoryInterface;
use \PDO;
use \PDOStatement;

// implements CommentsRepositoryInterface
class SqliteCommentsRepository {
    public function __construct(
        private PDO $connection
    ){}

    public function save(Comment $comment) :void {
        $statement = $this->connection->prepare(
            'INSERT INTO comments
                (uuid, user_uuid, post_uuid, text)
            VALUES
                (:uuid, :user_uuid, :post_uuid, :text)'
        );

        $statement->execute([
            'uuid' => $comment->getUuid(),
            'user_uuid' => $comment->getAuthorUuid(),
            'post_uuid' => $comment->getPostUuid(),
            'text' => $comment->getText()
        ]);

        echo 'Done';
    }
}