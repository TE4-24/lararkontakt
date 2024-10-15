<?php

namespace App\Controllers;

use App\Controller;

class pageController extends Controller
{

    public  function teachers()
    {
        $this->render('teachers');
    }

}