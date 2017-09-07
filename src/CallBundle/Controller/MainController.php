<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 12:24
 */

namespace CallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function indexAction(Request $request)
    {
        return new Response("");
    }

}