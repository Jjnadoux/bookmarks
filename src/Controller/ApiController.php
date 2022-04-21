<?php

namespace App\Controller;

use App\Services\ApiService;
use Embed\Embed;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

class ApiController extends AbstractController
{
    /**
     * Add a new Link.
     * 
     * @Route("/api/urllink/add", methods={"POST"})
     *
     * @OA\Response(
     *     response=200,
     *     description="New Link added",
     *     )
     * @OA\Response(
     *     response=400,
     *     description="It is not a url returning an image or a video",
     *     )
     * @OA\Parameter(
     *     name="url",
     *     in="query",
     *     description="url to add",
     *     @OA\Schema(type="string")
     * )
     * 
     * @param Request $request
     * @param ApiService $apiService
     * 
     * @return Response
    */
    public function addUrl(Request $request, ApiService $apiService): Response
    {
        $urlLink = $request->query->get("url");
      
        $embed = new Embed();
        
        $info = $embed->get($urlLink);
        $oembed = $info->getOEmbed();
        $type = $oembed->get('type');
        // In case url returns neither image nor video.
        if ($type == null){
            return $this->json("It's not a url returning an image or a video", 400);
        }

        $apiService->createNewLink($info);
    
        return $this->json('Successful creation', 200);
    }

    
    /**
     * Delete link.
     * 
     * @Route("/api/urllink/delete/{id}", methods={"DELETE"})
     *
     * @OA\Response(
     *     response=200,
     *     description="link deleted",
     *     )
     * @OA\Response(
     *     response=400,
     *     description="link no found",
     *     )
     * 
     * @param ApiService $apiService
     * @param int $id
     *
     * @return Response
    */
    public function deleteLink(ApiService $apiService, $id): Response
    {
        $apiService->deletedLink($id);

        return $this->json("link deleted", 200);
    }

    /**
     * Get all links.
     *
     * @Route("/api/urllinks", methods={"GET"})
     *
     * @OA\Response(
     *     response=200,
     *     description="list of Links",
     *     )
     * @param ApiService $apiService
     *
     * @return Response
    */
    public function listLinks(ApiService $apiService): Response
    {
        $links = $apiService->listAllLink();
       
        return $this->json(['response' => $links]);
    }
}