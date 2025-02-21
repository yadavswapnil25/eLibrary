<?php

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class RegisterResponseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'RegisterResponse',
        'description' => 'Response for register mutation',
    ];

    public function fields(): array
    {
        return [
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Email of the user',
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'First name of the user',
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Last name of the user',
            ],
            'message' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Message of the operation',
            ],
            'error' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Error message',
            ],
            'status' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Status of the operation',
            ],
        ];
    }
}
