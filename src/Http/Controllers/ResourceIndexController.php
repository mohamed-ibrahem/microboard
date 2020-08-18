<?php

namespace Microboard\Http\Controllers;

use Microboard\Http\Requests\MicroboardRequest;

class ResourceIndexController extends Controller
{
    public function __invoke(MicroboardRequest $request)
    {
        $resource = $request->resource();

        return view('microboard::resource.index', [
            'resource' => $resource,
            'label' => $resource::label(),
            'authorizedToCreate' => true,
        ]);
    }
}
