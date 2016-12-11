<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active = false;

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
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set is_active
     *
     * @param boolean $is_active
     *
     * @return Product
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
     /**
    * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
    */
    // private $products;

    // public function __construct()
    // {
    //     $this->products = new ArrayCollection();
    // }

    // public function getProducts()
    // {
    //     return $this->products;
    // }

    /**
    * @ORM\OneToMany(targetEntity="Subcategory", mappedBy="category")
    */
    private $subcategories;

    public function __construct()
    {
        $this->subcategories = new ArrayCollection();
       // return $this->subcategories->getName();
    }

    public function getSubcategories()
    {
        return $this->subcategories;
    }
    
    
}

