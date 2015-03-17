<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Caja;

class CajaManager
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

    public function createCaja()
    {
        $class = $this->getClass();
        $post = new $class();

        return $post;
    }

    public function saveCaja(Caja $caja)
    {
        $this->em->persist($caja);
        $this->em->flush();
    }

    public function updateCaja(Caja $caja)
    {
        $this->em->flush();
    }

    private function getClass()
    {
        return $this->class;
    }
}
