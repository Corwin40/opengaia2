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
    public function update(Request $request, $id, EntityManagerInterface $em)
    {
        $user = $this->getUser();
        if(!$user) return $this->json([
            'code' => 403,
            'message' => "Non authorisé"
        ], 403);

        // logique pour updater le membre
        $memberUpdate = $this->getDoctrine()->getRepository(Member::class)->find($id);

        $data = $request->getContent();


        return $this->json($memberUpdate, 200);
    }
}