<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\CommentsRepository;

use GeekBrains\LevelTwo\Blog\{Comment,UUID};
use GeekBrains\LevelTwo\Blog\Exceptions\CommentNotFoundException;
use GeekBrains\LevelTwo\Blog\Repositories\CommentsRepository\CommentsRepositoryInterface;
use \PDO;
use \PDOStatement;

class SqliteCommentsRepository implements CommentsRepositoryInterface {
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
    }

    public function get(UUID $uuid) :Comment {
        $statement = $this->connection->prepare(
            'SELECT * FROM comments WHERE uuid = :uuid'
        );

        $statement->execute([
            'uuid' => (string)$uuid
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            throw new CommentNotFoundException("Comment not found: $uuid");
        }

        return new Comment(
            new UUID($result['uuid']),
            new UUID($result['user_uuid']),
            new UUID($result['post_uuid']),
            $result['text']
        );
    }

    public function getByUserUuid(UUID $uuid) :array {
        $result = [];
        $statement = $this->connection->prepare(
            'SELECT * FROM comments WHERE user_uuid = :user_uuid'
        );

        $statement->execute([
            'user_uuid' => (string)$uuid
        ]);

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            throw new CommentNotFoundException("Comment by user uuid not found: $uuid");
        }

        foreach ($result as $key => $value) {
            $result[$key] = new Comment(
                new UUID($value['uuid']),
                new UUID($value['user_uuid']),
                new UUID($value['post_uuid']),
                $value['text']
            );
        }

        return $result;
    }
}