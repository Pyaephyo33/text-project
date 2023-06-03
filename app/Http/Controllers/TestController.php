<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
        return view('admin.test-folder.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = 'create';
        return view('admin.test-folder.creat-edit', compact('status'));
    }
}
