<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardEmployeeReviewsController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-employe/moderer-les-avis", name="app_dashboard_employee_reviews")
     */
    public function index(): Response
    {
        return $this->render('dashboard_employee_reviews.html.twig');
    }
}
