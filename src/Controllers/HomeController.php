<?php

namespace App\Controllers;

use App\Controller;


class HomeController extends Controller
{
    public function homePage()
    {
        $this->render('homePage/login');
    } 
}