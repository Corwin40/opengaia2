<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 * @Route("/op_admin/dashboard", name="op_admin_dashboard_")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        $user = $this->getUser();

        if(!$user){
            return $this->redirectToRoute('op_admin_security_login');
        }

        return $this->render('admin/dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/site", name="site")
     */
    public function site() :Response {
        $user = $this->getUser();

        if(!$user){
            return $this->redirectToRoute('op_admin_security_login');
        }

        return $this->render('admin/dashboard/site.html.twig');
    }

    /**
     * @Route("/first_install", name="first_install")
     **/
    public function first_install()
    {
        return $this->render('admin/install/firstinstall.html.twig');
    }
}
