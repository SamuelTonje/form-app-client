<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {

        return $this->render('MainBundle:Home:index.html.twig', array(
            'data' => 'Hello world'
        ));
    }
}
