<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminNewEmployeeController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-admin/nouvel-employe", name="app_dashboard_admin_new_employee")
     */
    public function index(): Response
    {
        return $this->render('dashboard_admin_new_employee.html.twig');
    }
}
