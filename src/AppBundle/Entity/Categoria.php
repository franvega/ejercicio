<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity
 */
class Categoria
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
     * Relación OneToMany Categoria-Cajas.
     *
     * @var Categoria
     *
     * @ORM\OneToMany(targetEntity="Caja", mappedBy="categoria", cascade={"remove"})
     */
    protected $cajas;

    public function __construct()
    {
        $this->cajas = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
}
