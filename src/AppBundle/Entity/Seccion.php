<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="secciones")
 * @ORM\Entity
 */
class Seccion
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     *
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    protected $nombre;

    /**
     *
     * @var DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     *
     * @var DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
     protected $updatedAt;

    /**
     * Relación ManyToMany Categorias-Secciones.
     *
     * @var Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categoria", inversedBy="secciones", cascade={"persist"})
     * @ORM\JoinTable(name="secciones_categorias")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    protected $categorias;

    public function __construct()
    {
        $this->categorias = new ArrayCollection();
        $this->cajas = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
}
