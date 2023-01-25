<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'pageMeta' => [
                'layout' => 'default',
            ],
        ];
        
        return view('home', $data);
    }
}
