<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardEmployeeController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-employe", name="app_dashboard_employee")
     */
    public function index(): Response
    {
        return $this->render('dashboard_employee.html.twig');
    }
}
