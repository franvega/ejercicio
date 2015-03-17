<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="cajas")
 * @ORM\Entity
 */
class Caja
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
    protected $altura;

    /**
     *
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    protected $longitud;

    /**
     *
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    protected $profundidad;

    /**
     *
     * @var integer
     *
     * @ORM\Column(type="decimal", precision=19, scale=2, nullable=true)
     */
    protected $volumen;

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
     * Relación ManyToOne Cajas-Categoria.
     *
     * @var Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="cajas")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    protected $categoria;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;
        return $this;
    }

    public function getLongitud()
    {
        return $this->longitud;
    }

    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
        return $this;
    }

    public function getProfundidad()
    {
        return $this->profundidad;
    }

    public function setProfundidad($profundidad)
    {
        $this->profundidad = $profundidad;
        return $this;
    }

    public function setCategoria(\AppBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }
}
