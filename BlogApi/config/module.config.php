<?php
return [
    'router' => [
        'routes' => [
            'blog-api.rest.posts' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/posts[/:posts_id]',
                    'defaults' => [
                        'controller' => 'BlogApi\\V1\\Rest\\Posts\\Controller',
                    ],
                ],
            ],
            'blog-api.rest.topics' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/topics[/:topics_id]',
                    'defaults' => [
                        'controller' => 'BlogApi\\V1\\Rest\\Topics\\Controller',
                    ],
                ],
            ],
            'blog-api.rest.users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users[/:users_id]',
                    'defaults' => [
                        'controller' => 'BlogApi\\V1\\Rest\\Users\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'blog-api.rest.posts',
            1 => 'blog-api.rest.topics',
            2 => 'blog-api.rest.users',
        ],
    ],
    'api-tools-rest' => [
        'BlogApi\\V1\\Rest\\Posts\\Controller' => [
            'listener' => 'BlogApi\\V1\\Rest\\Posts\\PostsResource',
            'route_name' => 'blog-api.rest.posts',
            'route_identifier_name' => 'posts_id',
            'collection_name' => 'posts',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
                3 => 'POST',
                4 => 'PATCH',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'search',
                1 => 'category',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \BlogApi\V1\Rest\Posts\PostsEntity::class,
            'collection_class' => \BlogApi\V1\Rest\Posts\PostsCollection::class,
            'service_name' => 'posts',
        ],
        'BlogApi\\V1\\Rest\\Topics\\Controller' => [
            'listener' => 'BlogApi\\V1\\Rest\\Topics\\TopicsResource',
            'route_name' => 'blog-api.rest.topics',
            'route_identifier_name' => 'topics_id',
            'collection_name' => 'topics',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'name',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \BlogApi\V1\Rest\Topics\TopicsEntity::class,
            'collection_class' => \BlogApi\V1\Rest\Topics\TopicsCollection::class,
            'service_name' => 'topics',
        ],
        'BlogApi\\V1\\Rest\\Users\\Controller' => [
            'listener' => 'BlogApi\\V1\\Rest\\Users\\UsersResource',
            'route_name' => 'blog-api.rest.users',
            'route_identifier_name' => 'users_id',
            'collection_name' => 'users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'username',
                1 => 'email',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \BlogApi\V1\Rest\Users\UsersEntity::class,
            'collection_class' => \BlogApi\V1\Rest\Users\UsersCollection::class,
            'service_name' => 'users',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'BlogApi\\V1\\Rest\\Posts\\Controller' => 'HalJson',
            'BlogApi\\V1\\Rest\\Topics\\Controller' => 'HalJson',
            'BlogApi\\V1\\Rest\\Users\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'BlogApi\\V1\\Rest\\Posts\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Topics\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'BlogApi\\V1\\Rest\\Posts\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Topics\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \BlogApi\V1\Rest\Posts\PostsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.posts',
                'route_identifier_name' => 'posts_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \BlogApi\V1\Rest\Posts\PostsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.posts',
                'route_identifier_name' => 'posts_id',
                'is_collection' => true,
            ],
            \BlogApi\V1\Rest\Topics\TopicsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.topics',
                'route_identifier_name' => 'topics_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \BlogApi\V1\Rest\Topics\TopicsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.topics',
                'route_identifier_name' => 'topics_id',
                'is_collection' => true,
            ],
            \BlogApi\V1\Rest\Users\UsersEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.users',
                'route_identifier_name' => 'users_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \BlogApi\V1\Rest\Users\UsersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.users',
                'route_identifier_name' => 'users_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools' => [
        'db-connected' => [
            'BlogApi\\V1\\Rest\\Posts\\PostsResource' => [
                'adapter_name' => 'MariaDB',
                'table_name' => 'posts',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'BlogApi\\V1\\Rest\\Posts\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'BlogApi\\V1\\Rest\\Posts\\PostsResource\\Table',
            ],
            'BlogApi\\V1\\Rest\\Topics\\TopicsResource' => [
                'adapter_name' => 'MariaDB',
                'table_name' => 'topics',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'BlogApi\\V1\\Rest\\Topics\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'BlogApi\\V1\\Rest\\Topics\\TopicsResource\\Table',
            ],
            'BlogApi\\V1\\Rest\\Users\\UsersResource' => [
                'adapter_name' => 'MariaDB',
                'table_name' => 'users',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'BlogApi\\V1\\Rest\\Users\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'BlogApi\\V1\\Rest\\Users\\UsersResource\\Table',
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'BlogApi\\V1\\Rest\\Posts\\Controller' => [
            'input_filter' => 'BlogApi\\V1\\Rest\\Posts\\Validator',
        ],
        'BlogApi\\V1\\Rest\\Topics\\Controller' => [
            'input_filter' => 'BlogApi\\V1\\Rest\\Topics\\Validator',
        ],
        'BlogApi\\V1\\Rest\\Users\\Controller' => [
            'input_filter' => 'BlogApi\\V1\\Rest\\Users\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'BlogApi\\V1\\Rest\\Posts\\Validator' => [
            0 => [
                'name' => 'user_id',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'continue_if_empty' => false,
            ],
            1 => [
                'name' => 'topic_id',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'Laminas\\ApiTools\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => [
                            'adapter' => 'MariaDB',
                            'table' => 'topics',
                            'field' => 'id',
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\NotEmpty::class,
                        'options' => [
                            'message' => 'Wybierz kategorię',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'title',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\NotEmpty::class,
                        'options' => [
                            'message' => 'Wymagany tytuł posta',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'image',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\NotEmpty::class,
                        'options' => [
                            'message' => 'Wymagane zdjęcie',
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'image_p',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\NotEmpty::class,
                        'options' => [
                            'message' => 'Wymagane zdjęcie',
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'body',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 65535,
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\NotEmpty::class,
                        'options' => [
                            'message' => 'Wymagana treść posta',
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'ingredients',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 65535,
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\NotEmpty::class,
                        'options' => [
                            'message' => 'Dodaj składniki',
                        ],
                    ],
                ],
            ],
            7 => [
                'name' => 'published',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'allow_empty' => false,
                'continue_if_empty' => true,
            ],
            8 => [
                'name' => 'created',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\DateTimeFormatter::class,
                        'options' => [
                            'format' => 'Y-m-d H:i:s',
                        ],
                    ],
                ],
                'validators' => [],
            ],
        ],
        'BlogApi\\V1\\Rest\\Topics\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'Laminas\\ApiTools\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'MariaDB',
                            'table' => 'topics',
                            'field' => 'name',
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'description',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 65535,
                        ],
                    ],
                ],
            ],
        ],
        'BlogApi\\V1\\Rest\\Users\\Validator' => [
            0 => [
                'name' => 'admin',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'allow_empty' => false,
            ],
            1 => [
                'name' => 'username',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'email',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'Laminas\\ApiTools\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'MariaDB',
                            'table' => 'users',
                            'field' => 'email',
                        ],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                    2 => [
                        'name' => \Laminas\Validator\EmailAddress::class,
                        'options' => [
                            'message' => 'Wprowadzony adres e-mail jest niepoprawny',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'password',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'created_at',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\DateTimeFormatter::class,
                        'options' => [
                            'format' => 'Y-m-d H:i:s',
                        ],
                    ],
                ],
                'validators' => [],
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'BlogApi\\V1\\Rest\\Posts\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'BlogApi\\V1\\Rest\\Topics\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'BlogApi\\V1\\Rest\\Users\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
];
