<?php

namespace MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse; 

class LoginController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function displayLoginFormAction(Request $request) {
        $params = ['page_slug' => 'page-connexion'];
               return $this->render('MainBundle:Login:form_login.html.twig', $params);
    }

}
