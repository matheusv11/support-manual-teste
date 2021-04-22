<?php
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/utils/functions.php';

use App\Classes\Post;
use App\Classes\User;
use Steampixel\Route;
use App\Classes\PostManager;

session_start();

/*

---- GET REQUESTS ----

*/

Route::add('/', function () {
    $data = Post::getAll(4, 'DESC');


    $data = array_map(function ($line) {
        switch ($line['difficulty']) {
            case 1:
                $line['difficulty'] = 'Baixa';
                break;
            case 2:
                $line['difficulty'] = 'Media';
                break;
            case 3:
                $line['difficulty'] = 'Alta';
                break;
        }
        if ($line['imageUrl'] == "") $line['imageUrl'] = "/images/default.png";
        return $line;
    }, $data);

    view('index', $data);
});
Route::add('/login', function () {
    checkSession(true);
    rawView('login');
});


Route::add('/postagem/([0-9]+)', function ($id) {
    $data = Post::getPost($id);
    if ($data) {
        view("post", $data[0], ["footerDark" => true]);
    } else {
        view('404', null, ["footerDark" => true]);
    }
});

Route::add('/criar', function () {
    checkSession();
    view('criar', null, ["footerDark" => true]);
});

Route::add('/editar/([0-9]+)', function ($id) {
    checkSession();
    $data = Post::getPost($id);
    if ($data) {
        view('editar', $data[0], ["footerDark" => true]);
    } else {
        view('404', null, ["footerDark" => true]);
    }
});

Route::add('/teste', function () {
    view('teste');
});

Route::add('/sair', function () {
    checkSession();
    session_destroy();
    header('Location:/');
    exit();
});

Route::add('/perfil', function () {
    checkSession();
    $data = Post::getAllUser($_SESSION['user']['id']);
    view('perfil', $data, ["footerDark" => true]);
});

Route::add('/postagens', function () {
    $data = Post::getAll();

    $data = array_map(function ($line) {
        switch ($line['difficulty']) {
            case 1:
                $line['difficulty'] = 'Baixa';
                break;
            case 2:
                $line['difficulty'] = 'Media';
                break;
            case 3:
                $line['difficulty'] = 'Alta';
                break;
        }
        return $line;
    }, $data);

    view('postagens', $data, ["footerDark" => true]);
});
Route::add('/perfil/configuracao', function () {
    checkSession();
    view('configuracao', null, ["footerDark" => true]);
});


/*
            
            ---- POST REQUESTS ----
            
*/

Route::add('/criar', function () {
    checkSession();
    if (isset($_POST['postCode'])) {
        try {
            $res = Post::createPost($_POST['postName'], $_POST['imageUrl'], $_POST['postDifficulty'], $_POST['postCode'], $_SESSION['user']['id']);
            if ($res) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } catch (PDOException $exception) {
            echo '<pre>';
            print_r($exception);
            echo '</pre>';
            http_response_code(505);
        }
    }
}, 'post');

Route::add('/editar', function () {
    checkSession();
    if (isset($_POST['postCode'])) {
        try {
            $res = Post::updatePost($_POST['id'], $_POST['postName'], $_POST['imageUrl'], $_POST['postDifficulty'], $_POST['postCode']);
            if ($res) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } catch (PDOException $exception) {
            http_response_code(500);
            echo '<pre>';
            print_r($exception);
            echo '</pre>';
        }
    }
}, 'post');

Route::add('/login', function () {
    if (isset($_POST['email'])) {
        try {
            $res = User::login($_POST['email'], $_POST['password']);
            if ($res) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } catch (PDOException $exception) {
            http_response_code(500);
        }
    }
}, 'post');
Route::add('/remover', function () {
    checkSession();
    if (isset($_POST['post_id'])) {
        try {
            $res = Post::removePost($_POST['post_id']);
            if ($res) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } catch (PDOException $exception) {
            http_response_code(500);
        }
    }
}, 'post');

Route::add('/perfil/nova-senha', function () {
    checkSession();
    if (isset($_POST['new_password']) && isset($_POST['old_password'])) {
        if (!empty($_POST['new_password']) && !empty($_POST['old_password'])) {
            try {
                $res = User::changePassword($_SESSION['user']['id'], $_POST['old_password'], $_POST['new_password']);
                if ($res) {
                    http_response_code(200);
                } else {
                    http_response_code(500);
                }
            } catch (PDOException $exception) {
                http_response_code(500);
            }
        }
    }
}, 'post');

/*

---- 404 PAGE ----

*/

Route::pathNotFound(function ($path) {
    header('HTTP/1.0 404 Not Found');
    view('404', null, ["footerDark" => true]);
});


Route::run('/');

function checkSession($reverse = false)
{
    if ($reverse) {
        if (isset($_SESSION['user'])) {
            header('Location:/');
            exit();
        }
    } else {
        if (!isset($_SESSION['user'])) {
            header('Location:/login');
            exit();
        }
    }
}
