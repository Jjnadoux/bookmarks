<?php

namespace App\Entity; 

use Doctrine\ORM\Mapping as ORM;
use App\Entity\UrlLinks as UrlLink;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoLinkRepository")
 */
class VideoLink extends UrlLink {

    /**
     * @var integer $largeur
     *
     * @ORM\Column(name="largeur", type="integer")
     */
    private $largeur;

    /**
     * @var integer $hauteur
     *
     * @ORM\Column(name="hauteur", type="integer")
     */
    private $hauteur;

    /**
     * @var integer $time
     * 
     * @ORM\Column(name="time", type="integer")
     */
    private $time;

}