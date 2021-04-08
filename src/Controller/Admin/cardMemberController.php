<?php

namespace App\Controller\Admin;

use App\Entity\Admin\cardMember;
use App\Form\Admin\cardMemberType;
use App\Repository\Admin\cardMemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/card/member")
 */
class cardMemberController extends AbstractController
{
    /**
     * @Route("/", name="admin_card_member_index", methods={"GET"})
     */
    public function index(cardMemberRepository $cardMemberRepository): Response
    {
        return $this->render('admin/card_member/index.html.twig', [
            'card_members' => $cardMemberRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_card_member_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cardMember = new cardMember();
        $form = $this->createForm(cardMemberType::class, $cardMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cardMember);
            $entityManager->flush();

            return $this->redirectToRoute('admin_card_member_index');
        }

        return $this->render('admin/card_member/new.html.twig', [
            'card_member' => $cardMember,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_card_member_show", methods={"GET"})
     */
    public function show(cardMember $cardMember): Response
    {
        return $this->render('admin/card_member/show.html.twig', [
            'card_member' => $cardMember,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_card_member_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, cardMember $cardMember): Response
    {
        $form = $this->createForm(cardMemberType::class, $cardMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_card_member_index');
        }

        return $this->render('admin/card_member/edit.html.twig', [
            'card_member' => $cardMember,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_card_member_delete", methods={"DELETE"})
     */
    public function delete(Request $request, cardMember $cardMember): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cardMember->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cardMember);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_card_member_index');
    }
}
