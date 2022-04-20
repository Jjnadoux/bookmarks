<?php

namespace App\Controller;

use App\Services\ApiService;
use DateTime;
use Embed\Embed;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/urllink/add")
     */
    public function addUrl(Request $request, ApiService $service): Response
    {
        $urllink = $request->query->get("url");
      
        $embed = new Embed();
        
        $info = $embed->get($urllink);
        $oembed = $info->getOEmbed();
        dump($oembed);
        $type = $oembed->get('type');
        $title = $info->title;
        $author = $info->authorName;
        $provider = $info->providerName;
        $url = $info->url;
        $publishedDate = $info->publishedTime;
        $height = $oembed->get('height');
        $width = $oembed->get('width');
        if ($type == "video"){
            $time = $oembed->get('duration');
        } else {
            $time = null;
        }
        $addDate = new DateTime();
        
        $newLink = $service->newLink($type,$title, $author,$url,$provider,$publishedDate,$addDate,$width,$height,$time);
    

         return $this->json(['response'=> $newLink],200);
    }
}