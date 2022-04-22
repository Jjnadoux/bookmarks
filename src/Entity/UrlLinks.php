<?php

namespace App\Entity; 

use Doctrine\ORM\Mapping as ORM;

/**
 * UrlLink
 *
 * @ORM\Table(name="urllink")
 * @ORM\Entity(repositoryClass="App\Repository\UrlLinksRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"video_db" = "VideoLink", "image_db" = "ImageLink"})
 */

 abstract class UrlLinks
 {
     /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string $provider
     *
     * @ORM\Column(name="provider", type="string", length=255)
     */
    private $provider;

     /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

     /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

     /**
     * @var date $addDate
     *
     * @ORM\Column(name="addDate", type="date")
     */
    private $addDate;

    /**
     * @var date $publishedDate
     *
     * @ORM\Column(name="publishedDate", type="date", nullable=true)
     */
    private $publishedDate;

    /**
     * Get $publishedDate 
     *
     * @return  date
     */ 
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * Set $publishedDate
     *
     * @param  date  $publishedDate  $publishedDate
     *
     * @return  self
     */ 
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }

    /**
     * Get $addDate
     *
     * @return  date
     */ 
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set $addDate
     *
     * @param  dateTime  $addDate  $addDate
     *
     * @return  self
     */ 
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get $author
     *
     * @return  string|NULL
     */ 
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Set $author
     *
     * @param  string|NULL  $author  $author
     *
     * @return  self
     */ 
    public function setAuthor(?string $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get $id
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get $url
     *
     * @return  string
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set $url
     *
     * @param  string  $url  $url
     *
     * @return  self
     */ 
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get $title
     *
     * @return  string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set $title
     *
     * @param  string  $title  $title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get $provider
     *
     * @return  string
     */ 
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set $provider
     *
     * @param  string  $provider  $provider
     *
     * @return  self
     */ 
    public function setProvider(string $provider)
    {
        $this->provider = $provider;

        return $this;
    }
 }