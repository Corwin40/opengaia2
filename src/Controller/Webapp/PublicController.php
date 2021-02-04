<?php

namespace App\Controller\Webapp;

use App\Entity\Admin\Parameter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class PublicController
 * @package App\Controller\Webapp
 * @Route("", name="op_webapp_public_")
 */
class PublicController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): RedirectResponse
    {
        $parameter = $this->getDoctrine()->getRepository(Parameter::class)->find(1);

        // boucle : verifie si le site est installé
        if(!$parameter){
            return $this->redirectToRoute('op_admin_first_install');
        }
        else {
            return $this->redirectToRoute('op_webapp_page_index');
        }

    }

    public function meta() : Response
    {
        $parameter = $this->getDoctrine()->getRepository(Parameter::class)->find(1);

        return $this->render('include/meta.html.twig', [
            'parameter' => $parameter
        ]);
    }
}
