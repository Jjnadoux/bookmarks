<?php

namespace App\Entity; 

use Doctrine\ORM\Mapping as ORM;
use App\Entity\UrlLinks as UrlLink;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoLinkRepository")
 */
class VideoLink extends UrlLink {

    /**
     * @var integer $width
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @var integer $height
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    /**
     * @var integer $time
     * 
     * @ORM\Column(name="time", type="integer")
     */
    private $time;


    /**
     * Get $width
     *
     * @return  integer
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set $width
     *
     * @param  integer  $width  $width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get $height
     *
     * @return  integer
     */ 
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set $height
     *
     * @param  integer  $height  $height
     *
     * @return  self
     */ 
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get $time
     *
     * @return  integer
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set $time
     *
     * @param  integer  $time  $time
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }
}