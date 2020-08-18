<?php

namespace Microboard\Tests\Fixtures;

use App\User as Model;
use Illuminate\Http\Request;
use Microboard\Fields\ID;
use Microboard\Fields\Text;
use Microboard\Resource;

class User extends Resource
{
    /**
     * @var string
     */
    public static $model = Model::class;

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
