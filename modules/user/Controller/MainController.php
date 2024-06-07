<?php

namespace Modules\User\Controller;

use Illuminate\Routing\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view("user.main", [
            "title" => "Trang chủ",
        ]);
    }
}