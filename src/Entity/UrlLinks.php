<?php

namespace App\Entity; 

use Doctrine\ORM\Mapping as ORM;


/**
 * UrlLink
 *
 * @ORM\Table(name="urllink")
 * @ORM\Entity(repositoryClass="App\Repository\LinkRepository")
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
     * @ORM\Column(name="author", type="string", length=255)
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
     * @ORM\Column(name="publishedDate", type="date")
     */
    private $publishedDate;
 }