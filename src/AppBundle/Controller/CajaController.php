<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Caja;
use AppBundle\Form\Type\CajaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/cajas")
 */
class CajaController extends Controller
{
    /**
     * @Route("/", name="cajas")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Caja');
        $cajas = $repository->findAll();

        return $this->render(
            'caja/index.html.twig',
            ['cajas' => $cajaes]
        );
    }

    /**
     * @Route("/new", name="caja_new")
     */
    public function newAction(Request $request)
    {
        $cajaManager = $this->container->get('app.manager.caja');
        $caja = $cajaManager->createcaja();

        $form = $this->createForm(new CajaType(), $caja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cajaManager->saveCaja($caja);

            $this->addFlash(
                'notice',
                'Caja creada con éxito'
            );

            //Calcular el volumen. Guardar en db y sesion
        }

        return $this->render(
            'caja/new.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * @Route("/{id}/edit", name="caja_edit")
     */
    public function editAction(Request $request, Post $post)
    {
        $form = $this->createForm(new PostType(), $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cajaManager = $this->container->get('app.manager.caja');
            $cajaManager->updatecaja($caja);
        }

        return $this->render(
            'caja/edit.html.twig',
            ['form' => $form->createView()]
        );
    }
}
