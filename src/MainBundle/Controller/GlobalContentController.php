<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GlobalContentController extends Controller
{
    public function indexAction(Request $request, $zone, $currentRoute = null)
    {
        if (in_array($zone, ['header', 'footer', 'footer-login'])) {
            $request->attributes->set('_route', $currentRoute);
            return $this->render('MainBundle:Global:'.$zone.'.html.twig', ['data' => [$zone]]);
        }
    }
}
