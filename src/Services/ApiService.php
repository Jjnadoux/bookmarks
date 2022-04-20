<?php

namespace App\Services;

use App\Entity\ImageLink;
use App\Entity\VideoLink;
use Doctrine\ORM\EntityManagerInterface;


class ApiService
{
    protected $em;

    /**
     * StatutService constructor.
     * @param $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

   /**
   * 
   */
  public function newLink($type, $title, $author,$url,$provider,$publishedDate,$addDate,$width,$height, $time)
  {
    dump($type);
      if ($type == "video"){
        $newLink = new VideoLink ();
        $newLink->setTime($time);
      } else {
        $newLink = new ImageLink();
      }
      $newLink->setTitle($title);
      $newLink->setAuthor($author);
      $newLink->setProvider($provider);
      $newLink->setUrl($url);
      $newLink->setPublishedDate($publishedDate);
      $newLink->setAddDate($addDate);
      $newLink->setWidth($width);
      $newLink->setHeight($height);
      $this->em->persist($newLink);
      $this->em->flush();

      return $newLink;
  }
}
