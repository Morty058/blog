<?php

function validateTopic($topic)
{
    $errors = array();

    if(empty($topic['name'])) {
        array_push($errors, 'Wymagana Nazwa Kategorii');
    }

    
    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTopic) {
        if(isset($topic['update-topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'Kategoria już istnieje');    
        }

        if(isset($topic['add-topic'])) {
            array_push($errors, 'Kategoria już istnieje');  
        }
    }

    return $errors;
}
