<?php

namespace Microboard\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $resource
     * @return Response|View
     */
    public function index($resource)
    {
        return view('microboard::resource.index', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $resource
     * @param int $resourceId
     * @return View
     */
    public function show($resource, $resourceId)
    {
        return view('microboard::resource.show', compact('resource', 'resourceId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $resource
     * @param int $resourceId
     * @return View
     */
    public function edit($resource, $resourceId)
    {
        return view('microboard::resource.edit', compact('resource', 'resourceId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
