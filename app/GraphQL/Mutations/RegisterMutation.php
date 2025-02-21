<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\User;
use Illuminate\Support\Str;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\Validator;
use App\Traits\Response;

class RegisterMutation extends Mutation
{
    protected $attributes = [
        'name' => 'register',
    ];

    public function type(): Type
    {
        return \GraphQL::type('RegisterResponse');
    }

    public function args(): array
    {
        return [
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        try {
         
        
            $validator = Validator::make($args, [
                'email' => 'required|email|unique:users',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'password' => 'required|string|min:8',
            ]);
            // dd($validator);
            if ($validator->fails()) {
                return [
                    'error' => 'Validation errors',
                    'message' => $validator->errors(),
                    'status' => 422,
                ];
            }

            $user = new User();
            $user->first_name = $args['first_name'];
            $user->last_name = $args['last_name'];
            $user->email = $args['email'];
            $user->role_id = 3;
            $user->password = bcrypt($args['password']);
            $user->email_verified_at = now();
            $user->created_at = now();
            $user->updated_at = now();
            $user->username = Str::slug($args['first_name'] . $args['last_name'], '_');
            $user->save();
            return [
                
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'message' => 'User registered successfully',
                'status' => 200,
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'An error occurred',
                'message' => $e->getMessage(),
            ];
        }
    }
}