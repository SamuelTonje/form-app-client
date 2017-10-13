<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $data = [
            'titre' => 'Titre de la page d\'accueil',
            'content' => 'Un contenu pris au hasard'
        ];
        return $this->render('MainBundle:Home:index.html.twig', array(
            'data' => $data
        ));
    }
}
