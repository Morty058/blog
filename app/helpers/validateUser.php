<?php

function validateUser($user)
{
    $errors = array();

    if(empty($user['username'])) {
        array_push($errors, 'Wymagana Nazwa Użytkownika');
    }

    if(empty($user['email'])) {
        array_push($errors, 'Wymagany Email');
    }

    if(empty($user['password'])) {
        array_push($errors, 'Wymagane Hasło');
    }

    if($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Podane hasła nie są jednakowe');
    }
    
    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Ten Email został już użyty');    
    // }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     if(isset($user['update-user']) && $existingUser['id'] != $user['id']) {
    //         array_push($errors, 'Ten Email został już użyty');    
    //     }

    //     if(isset($user['create-admin'])) {
    //         array_push($errors, 'Ten Email został już użyty');  
    //     }
    // }
    if (isset($user['update-user'])) {
        $existingUser = selectOne('users', ['email' => $user['email']]);
        if ($existingUser && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Ten Email został już użyty');
        }
    } else {
        $existingUser = selectOne('users', ['email' => $user['email']]);
        if ($existingUser) {
            if(isset($user['create-admin'])) {
                array_push($errors, 'Ten Email został już użyty');  
            }
        }
    }


    return $errors;
}



function validateLogin($user)
{
    $errors = array();

    if(empty($user['username'])) {
        array_push($errors, 'Wymagana Nazwa Użytkownika');
    }

    if(empty($user['password'])) {
        array_push($errors, 'Wymagane Hasło');
    }

    return $errors;
}