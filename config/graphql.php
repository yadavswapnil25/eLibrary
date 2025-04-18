<?php
return [

    'schemas' => [
        'default' => [
            'query' => [
                'booklets' => \App\GraphQL\Queries\BookletsQuery::class,
            ],
            'mutation' => [
                'login' => App\GraphQL\Mutations\LoginMutation::class,
                'register' => App\GraphQL\Mutations\RegisterMutation::class,
                'createAnswer' => App\GraphQL\Mutations\CreateAnswerMutation::class
            ],
        ],
    ],

    'types' => [
        'Booklet' => \App\GraphQL\Types\BookletType::class,
        'LoginResponse' => App\GraphQL\Types\LoginResponseType::class,
        'RegisterResponse' => App\GraphQL\Types\RegisterResponseType::class,
        'BookletQuestion'=>\App\GraphQL\Types\BookletQuestionType::class,
        'BookletAnswer'=>\App\GraphQL\Types\BookletAnswerType::class,
        'AnswerResponse'=>\App\GraphQL\Types\AnswerResponseType::class

    ],

];
