<?php 

function validatePost($post)
{
    $errors = array();

    if(empty($post['title'])) {
        array_push($errors, 'Wymagany tytuł posta');
    }

    if(empty($post['body'])) {
        array_push($errors, 'Wymagana treść posta');
    }

    if(empty($post['topic_id'])) {
        array_push($errors, 'Wybierz kategorie');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if(isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Post o takim tytule już istnieje');    
        }

        if(isset($post['add-post'])) {
            array_push($errors, 'Post o takim tytule już istnieje');  
        }
    }

    return $errors;
}
