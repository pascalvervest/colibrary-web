<?php

namespace CoLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collection Entityt
 *
 * @ORM\Table(name="collection")
 * @ORM\Entity(repositoryClass="CoLibraryBundle\Repository\CollectionRepository")
 */
class Collection
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Getter for id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getter for name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter for name
     *
     * @param mixed $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
