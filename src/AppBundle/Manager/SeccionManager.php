<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Seccion;

class SeccionManager
{
    protected $em;
    protected $repo;
    protected $class;

    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->class = $class;
        $this->repo = $em->getRepository($class);
    }

    public function createSeccion()
    {
        $class = $this->getClass();
        $post = new $class();

        return $post;
    }

    public function saveSeccion(Seccion $seccion)
    {
        $this->em->persist($seccion);
        $this->em->flush();
    }

    public function updateSeccion(Seccion $seccion)
    {
        $this->em->flush();
    }

    private function getClass()
    {
        return $this->class;
    }
}
