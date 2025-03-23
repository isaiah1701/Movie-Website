<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController

{

    public function about():Response

    {

        return new Response('Abot page – produced by my first Symfony controller');

    }

    

}