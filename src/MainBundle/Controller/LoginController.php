<?php

namespace MainBundle\Controller;

use Ffb\Easi\Bundle\MainBundle\Api\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse; 
use GuzzleHttp\Exception\ClientException;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
