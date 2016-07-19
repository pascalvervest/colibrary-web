<?php

namespace CoLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item Entity
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="CoLibraryBundle\Repository\ItemRepository")
 */
class Item
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="artist", type="string", length=255)
     */
    private $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Barcode", type="string", length=255)
     */
    private $barcode;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Item
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set barcode
     *
     * @param string $barcode
     *
     * @return Item
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get barcode
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }
    
    /**
     * Getter for artist
     * 
     * @return string
     */
    function getArtist()
    {
        return $this->artist;
    }

    /**
     * Setter for artist
     * 
     * @param type $artist
     * @return \CoLibraryBundle\Entity\Item
     */
    function setArtist($artist)
    {
        $this->artist = $artist;
        
        return $this;
    }


}

