<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Member;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/op_admin/memberjson", name="op_admin_memberjson_")
 */
class MemberJSONController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/update/{id}", name="update", methods={"POST"})
     */
    public function update(Request $request, $id, Member $member)
    {
        $user = $this->getUser();
        if(!$user) return $this->json([
            'code' => 403,
            'message' => "Non authorisé"
        ], 403);

        $data = $request->getContent();
        $update = json_decode($data, true);
        // logique pour updater le membre
        $member
            ->setFirstName($update['firstName'])
            ->setLastName($update['lastName'])
            ->setEmail($update['email'])
            ;
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($member);
        $entityManager->flush();

        return $this->json("ok", 200);
    }
}