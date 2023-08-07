<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminNewServiceController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-admin/nouveau-service", name="app_dashboard_admin_new_service")
     */
    public function index(): Response
    {
        return $this->render('dashboard_admin_new_service.html.twig');
    }
}
