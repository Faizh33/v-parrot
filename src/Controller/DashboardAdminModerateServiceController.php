<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminModerateServiceController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-admin/moderer-les-services", name="app_dashboard_admin_moderate_service")
     */
    public function index(): Response
    {
        return $this->render('dashboard_admin_moderate_service.html.twig');
    }
}
