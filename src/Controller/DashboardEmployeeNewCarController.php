<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardEmployeeNewCarController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-employe/nouvelle-voiture", name="app_dashboard_employee_new_car")
     */
    public function index(): Response
    {
        return $this->render('dashboard_employee_new_car.html.twig');
    }
}
