<?php

namespace App\Controller;

use Embed\Embed;
use Symfony\Component\BrowserKit\Request;
use Doctrine\Common\Annotations\Annotation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/urllink/add")
     */
    public function test(Request $request)
    {
        $url = $request->query->get("url");
        $embed = new Embed();
        $info = $embed->get($url);
        dump($info);
    }
}