<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Microboard Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Microboard will be accessible from. Feel free to
    | change this path to anything you like. Note that this URI will not
    | affect Microboard's internal API routes which aren't exposed to users.
    |
    */

    'path' => '/admin',

    /*
    |--------------------------------------------------------------------------
    | Microboard Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Microboard route, giving you the
    | chance to add your own middleware to this stack or override any of
    | the existing middleware. Or, you can just stick with this stack.
    |
    */

    'middleware' => [
        'web',
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Microboard Views configurators.
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Microboard route, giving you the
    | chance to add your own middleware to this stack or override any of
    | the existing middleware. Or, you can just stick with this stack.
    |
    */

    'view' => [
        'enable_notifications' => true,
        'enable_global_search' => true,
        'enable_breadcrumbs' => true
    ],
];
