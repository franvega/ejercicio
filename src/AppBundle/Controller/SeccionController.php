<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Seccion;
use AppBundle\Form\Type\SeccionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/secciones")
 */
class SeccionController extends Controller
{
    /**
     * @Route("/", name="secciones")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Seccion');
        $secciones = $repository->findAll();

        return $this->render(
            'seccion/index.html.twig',
            ['secciones' => $secciones]
        );
    }

    /**
     * @Route("/new", name="seccion_new")
     */
    public function newAction(Request $request)
    {
        $seccionManager = $this->container->get('app.manager.seccion');
        $seccion = $seccionManager->createSeccion();

        $form = $this->createForm(new SeccionType(), $seccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seccionManager->saveSeccion($seccion);

            $this->addFlash(
                'notice',
                'Sección creada con éxito'
            );
        }

        return $this->render(
            'seccion/new.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * @Route("/{id}/edit", name="seccion_edit")
     */
    public function editAction(Request $request, Post $post)
    {
        $form = $this->createForm(new PostType(), $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seccionManager = $this->container->get('app.manager.seccion');
            $seccionManager->updateSeccion($seccion);
        }

        return $this->render(
            'seccion/edit.html.twig',
            ['form' => $form->createView()]
        );
    }
}
