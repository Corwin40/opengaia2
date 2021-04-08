<?php

namespace App\Controller\Webapp;

use App\Entity\Admin\Parameter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Webapp\Page;

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
        $parameter = $this->getDoctrine()->getRepository(Parameter::class)->findFirstReccurence();
        // boucle : verifie si le site est installé
        if(!$parameter){
            return $this->redirectToRoute('op_admin_dashboard_first_install');
        }
        else {
            $isOnline = $parameter->getIsOnline();
            if(!$isOnline) {
                return $this->redirectToRoute('op_webapp_public_offline');
            }
            else{
                return $this->redirectToRoute('op_webapp_public_homepage');
            }

        }

    }

    public function meta() : Response
    {
        $parameter = $this->getDoctrine()->getRepository(Parameter::class)->find(1);

        return $this->render('include/meta.html.twig', [
            'parameter' => $parameter
        ]);
    }

    /**
     * @Route("/homepage/", name="homepage")
     */
    public function homepage() : Response
    {
        $homepage = $this->getDoctrine()->getRepository(Page::class)->firstPage();
        return $this->render('webapp/public/index.html.twig', [
            'homepage' => $homepage
        ]);
    }

    /**
     * @route("/offline", name="offline")
     */
    public function Offline() : Response
    {
        $parameter = $this->getDoctrine()->getRepository(Parameter::class)->find(1);
        return $this->render('webapp/public/Offline.html.twig', [
            'parameter' => $parameter
        ]);
    }

    /**
     * @Route ("/menus", name="listmenus")
     */
    public function BlocMenu(): Response
    {
        $menus = $this->getDoctrine()->getRepository(Page::class)->listMenu();

        return $this->render('include/navbar_webapp.html.twig', [
            'menus' => $menus
        ]);
    }
}
