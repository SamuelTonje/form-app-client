<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Ffb\Easi\Bundle\CmsProxyBundle\Api\Client;

class VersionController extends Controller
{
    public function getVersionAction()
    {
        $kernel = $this->get('kernel');
        $container = $kernel->getContainer();

        $data = $container->hasParameter('git') ? $container->getParameter('git') : [];
        $data['name'] = $container->hasParameter('application_name') ? $container->getParameter('application_name') : null;
        $data['env'] = $container->hasParameter('application_env') ? $container->getParameter('application_env') : null;
        $data['api'] = $this->get('ffb_easi_core.api.gateway')->getVersion();

        $response = new JsonResponse($data, 200, [
            'Access-Control-Allow-Origin' => '*',
        ]);
        $response->setTtl(3600);

        return $response;
    }
}
