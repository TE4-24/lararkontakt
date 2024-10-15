<?php

namespace App\Controllers;

use App\Controller;

class pageController extends Controller
{

    public  function pageOne()
    {
        $this->render('pageOne/index');
    }


    public function pageTwo()
    {

        $this->render('pageTwo/index');
    }

    public function pageThree()
    {

        $this->render('pageThree/index');
    }
}