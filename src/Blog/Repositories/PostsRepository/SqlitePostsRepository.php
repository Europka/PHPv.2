<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\PostsRepository;

use GeekBrains\LevelTwo\Blog\{Post,UUID};
use GeekBrains\LevelTwo\Blog\Exceptions\PostNotFoundException;
use GeekBrains\LevelTwo\Blog\Repositories\PostsRepository\PostsRepositoryInterface;
use \PDO;
use \PDOStatement;


class SqlitePostsRepository implements PostsRepositoryInterface {
    public function __construct(
        private PDO $connection
    ){}

    public function save(Post $post) :void {
        $statement = $this->connection->prepare(
            'INSERT INTO posts
                (uuid, user_uuid, title, text)
            VALUES
                (:uuid, :user_uuid, :title, :text)'
        );

        $statement->execute([
            'uuid' => $post->getUuid(),
            'user_uuid' => $post->getAuthorUuid(),
            'title' => $post->getTitle(),
            'text' => $post->getText()
        ]);
    }

    public function get(UUID $uuid) :Post {
        $statement = $this->connection->prepare(
            'SELECT * FROM posts WHERE uuid = :uuid'
        );

        $statement->execute([
            'uuid' => (string)$uuid
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            throw new PostNotFoundException("Post not found: $uuid");
        }

        return new Post(
            new UUID($result['uuid']),
            new UUID($result['user_uuid']),
            $result['title'],
            $result['text']
        );
    }

    public function getByUserUuid(UUID $uuid) :array {
        $result = [];

        $statement = $this->connection->prepare(
            'SELECT * FROM posts WHERE user_uuid = :user_uuid'
        );

        $statement->execute([
            'user_uuid' => (string)$uuid
        ]);

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            throw new PostNotFoundException("Post by user uuid not found: $uuid");
        }

        foreach ($result as $key => $value) {
            $result[$key] = new Post(
                new UUID($value['uuid']),
                new UUID($value['user_uuid']),
                $value['title'],
                $value['text']
            );
        }

        return $result;
    }
}