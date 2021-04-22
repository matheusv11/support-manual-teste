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
 * @name        User
 * @author      Ryan Maia
 *
 */
class User
{
    public static function login(string $email, string $password): bool
    {
        $con = Database::connect();

        $sql = "SELECT `id`, `access`, `password`, `name` FROM users WHERE email = :email";

        $statement = $con->prepare($sql);

        $result = $statement->execute([
            ":email"      => $email
        ]);

        if ($result) {
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['user'] = ["id" => $data['id'], "access" => $data['access'], "name" => $data['name']];
                    return true;
                }
            } else {
                return false;
            }
        }
        return false;
    }
    public static function changePassword(int $id, string $oldPassword, string $newPassword): bool
    {
        if ($oldPassword == $newPassword) return false;



        $con = Database::connect();

        $sql = "SELECT `id`, `access`, `password`, `name` FROM users WHERE id = :id";

        $statement = $con->prepare($sql);

        $result = $statement->execute([
            ":id"      => $id
        ]);

        if ($result) {
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                if (password_verify($oldPassword, $data['password'])) {
                    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $sql = "UPDATE users SET password = :password WHERE id = :id";

                    $statement = $con->prepare($sql);

                    $result = $statement->execute([
                        ":password"      => $newPassword,
                        ":id"      => $id
                    ]);

                    return ($result) ? true : false;
                }
            }
        }
        
        return false;
        
    }
}
