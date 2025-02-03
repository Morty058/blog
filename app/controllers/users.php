<?php
include_once(ROOT_PATH . "/app/database/db.php");
include_once(ROOT_PATH . "/app/helpers/validateUser.php");
include_once(ROOT_PATH . "/app/helpers/middleware.php");


$table = 'users';

$admin_users = selectAll($table, ['admin' => 1]);

$all_users = selectAll($table);
$admins = array();
$regular_users = array();

foreach ($all_users as $user) {
    if ($user['admin'] == 1) {
        $admins[] = $user;
    } else {
        $regular_users[] = $user;
    }
}

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';

function loginUser($user) {

    $_SESSION['id'] = $user['id'];      
    $_SESSION['username'] = $user['username'];  
    $_SESSION['admin'] = $user['admin'];  
    $_SESSION['message'] = 'Zostałeś poprawnie zalogowany';  
    $_SESSION['type'] = 'success';

    if($_SESSION['admin']) {
        header('location:' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location:' . BASE_URL . '/index.php'); 
    }

    exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    
    $errors = validateUser($_POST);

    if(count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if(isset($_POST['admin'])){
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Administrator został utworzony";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]); 
            loginUser($user);
        }
        

    }   else {
            $username = $_POST['username'];
            $admin = isset($_POST['admin']) ? 1 : 0;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConf = $_POST['passwordConf'];
    }
    
}

if(isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if(count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $user_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Dane użytkownika zostały zaktualizowane";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();      

    }   else {
            $username = $_POST['username'];
            $admin = isset($_POST['admin']) ? 1 : 0;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConf = $_POST['passwordConf'];
    }
}


if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $admin = $user['admin']; 
}


if(isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if(count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);    
        } else {
            array_push($errors, 'Błędna Nazwa Użytkownika lub Hasło');
        }   
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

}

if(isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Użytkownik został usunięty";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}