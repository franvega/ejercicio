<?
namespace AppBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Caja;

class VolumeLoader
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        if ($entity instanceof Caja) {
        	$entity->setVolumen($entity);

        	$em->flush();
        	//guardar en sesion
        }
    }
}