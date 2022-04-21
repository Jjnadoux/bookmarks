<?php

namespace App\Services;

use App\Entity\ImageLink;
use App\Entity\UrlLinks;
use App\Entity\VideoLink;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class ApiService
{
  /**
   * @var \Doctrine\ORM\EntityManagerInterface
   */
  protected $em;

  /**
   * StatutService constructor.
   * 
   * @param \Doctrine\ORM\EntityManagerInterface $em
   */
  public function __construct(EntityManagerInterface $em)
  {
      $this->em = $em;
  }

/**
 * Create a link with given embedEntity
 *
 * @param object $info
 * 
 * @return void
 */
  public function createNewLink($info)
  {
    $oembed = $info->getOEmbed();
    $type = $oembed->get('type');

    $title = $info->title;
    $author = $info->authorName;
    $provider = $info->providerName;
    $url = $info->url;
    $publishedDate = $info->publishedTime;
    $height = $oembed->get('height');
    $width = $oembed->get('width');
    
    if ($type === "video") {
      // create VideoLink entity
      $newLink = new VideoLink ();
      $newLink->setTime($oembed->get('duration'));
    }
    else {
      // create ImageLink entity
      $newLink = new ImageLink();
    }
    $addDate = new DateTime();

    // Add complementary properties
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

  }

  /**
   * Delete link with given id.
   *
   * @param int $id
   * 
   * @return void
   */
  public function deletedLink($id)
  {
    $urlLink = $this->em->getRepository(UrlLinks::class)->find($id);
    $this->em->remove($urlLink);
    $this->em->flush();
  }

  /**
   * Get all links.
   *
   * @return void
   */
  public function listAllLink()
  {
    $linksVideo = $this->em->getRepository(VideoLink::class)->findAllWithoutDatePublished();
    $linksImage = $this->em->getRepository(ImageLink::class)->findAllWithoutDatePublished();
   
    return array_merge($linksVideo, $linksImage);
  }
}
