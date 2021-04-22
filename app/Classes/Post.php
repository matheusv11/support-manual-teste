<?php

namespace App\Classes;

use App\Classes\Database;
use PDO;
use PDOException;

/**
 * Classe responsável por gerenciar criação de postagens
 *
 * @package     app
 * @subpackage  Classes
 * @name        Post
 * @author      Ryan Maia
 *
 */
class Post
{
    public static function createPost(string $title, string $imageUrl = null, string $difficulty, string $content, int $userId): bool
    {
        $con = Database::connect();

        $sql = "INSERT INTO posts VALUES (DEFAULT, :title, :imageUrl, :difficulty, :content, NOW(), :user_id)";
        $statement = $con->prepare($sql);

        $result = $statement->execute([
            ":title"      => $title,
            ":imageUrl"   => $imageUrl,
            ":difficulty" => $difficulty,
            ":content"    => $content,
            ":user_id"    => $userId
        ]);

        return $result;
    }
    public static function updatePost(int $id, string $title, string $imageUrl = null, string $difficulty, string $content): bool
    {
        $con = Database::connect();

        $sql = "UPDATE posts SET title = :title, imageUrl = :imageUrl, difficulty = :difficulty, content = :content WHERE id = :id";
        $statement = $con->prepare($sql);

        $statement->bindValue(':title', $title);
        $statement->bindValue(':imageUrl', $imageUrl);
        $statement->bindValue(':difficulty', $difficulty);
        $statement->bindValue(':content', $content);
        $statement->bindValue(':id', $id);

        $result = $statement->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function getPost(int $id): array
    {
        $con = Database::connect();

        $sql = "SELECT * FROM posts WHERE id = :id LIMIT 1";

        $statement = $con->prepare($sql);

        $result = $statement->execute([
            ":id" => $id
        ]);
        if ($result) {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            return [];
        }
    }
    public static function removePost(int $id): bool
    {
        $con = Database::connect();

        $sql = "DELETE FROM posts WHERE id = :id";

        $statement = $con->prepare($sql);

        $result = $statement->execute([
            ":id" => $id
        ]);
        return $result;
    }
    public static function getAll(int $limit = null, string $order = "ASC"): array
    {
        $con = Database::connect();

        $sql = (isset($limit)) ? "SELECT * FROM posts ORDER BY id $order LIMIT $limit" : "SELECT * FROM posts ORDER BY id $order";

        $statement = $con->prepare($sql);

        $result = $statement->execute();

        if ($result) {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            return [];
        }
    }
    public static function getAllUser(int $userId): array
    {
        $con = Database::connect();

        $sql = "SELECT id,title,create_date FROM posts WHERE user_id = :user_id ORDER BY id";

        $statement = $con->prepare($sql);

        $result = $statement->execute([
            "user_id" => $userId
        ]);

        if ($result) {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            return [];
        }
    }
}
