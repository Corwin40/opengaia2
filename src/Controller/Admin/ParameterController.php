<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Parameter;
use App\Form\Admin\ParameterType;
use App\Repository\Admin\ParameterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/op_admin/parameter", name="op_admin_parameter_")
 */
class ParameterController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ParameterRepository $parameterRepository): Response
    {
        return $this->render('admin/parameter/index.html.twig', [
            'parameters' => $parameterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parameter = new Parameter();
        $form = $this->createForm(ParameterType::class, $parameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parameter);
            $entityManager->flush();

            return $this->redirectToRoute('admin_parameter_index');
        }

        return $this->render('admin/parameter/new.html.twig', [
            'parameter' => $parameter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Parameter $parameter): Response
    {
        return $this->render('admin/parameter/show.html.twig', [
            'parameter' => $parameter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Parameter $parameter): Response
    {

        $form = $this->createForm(ParameterType::class, $parameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('op_admin_parameter_edit', ['id' => 1 ]);
        }

        return $this->render('admin/parameter/edit.html.twig', [
            'parameter' => $parameter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, Parameter $parameter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parameter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parameter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_parameter_index');
    }
}
