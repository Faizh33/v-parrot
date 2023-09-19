<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalNoticeController extends AbstractController
{
    /**
     * @Route("/mentions-legales", name="legal-notice")
     */
    public function index(): Response
    {
        return $this->render('legal-notice.html.twig');
    }
};