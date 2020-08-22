<?php

namespace Microboard\Tests\Fixtures;

use Illuminate\Http\Request;
use Microboard\Fields\ID;
use Microboard\Fields\Text;
use Microboard\Resource;

class UserResource extends Resource
{
    /**
     * @var string
     */
    public static $model = User::class;

    /**
     * @var string[]
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * @return string
     */
    public static function label()
    {
        return 'Users';
    }

    /**
     * @return string
     */
    public static function uriKey()
    {
        return 'users';
    }

    /**
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(),
//            Avatar::make('avatar'),
            Text::make('Name'),
            Text::make('Email'),
        ];
    }
}
