<?php

namespace Microboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Microboard\Microboard;

class MicroboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Get the class name of the resource being requested.
     *
     * @return mixed
     */
    public function resource()
    {
        return tap(Microboard::resourceForKey($this->route('resource')), function ($resource) {
            abort_if(is_null($resource), 404);
        });
    }
}
