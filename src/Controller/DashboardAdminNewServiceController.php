<?php

namespace App\Controller;

use App\Entity\Repair;
use App\Form\RepairType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminNewServiceController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/tableau-de-bord-admin/nouveau-service", name="app_dashboard_admin_new_service")
     */
    public function index(Request $request): Response
    {
        $repair = new Repair();
        $form = $this->createForm(RepairType::class, $repair);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($repair);
            $this->entityManager->flush();

            $this->addFlash('success', "Le service à été ajouté en base de données.");

            return $this->redirectToRoute('dashboard-admin-5');
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Il y a des erreurs dans le formulaire. Veuillez le corriger.');
        }

        return $this->render('dashboard_admin_new_service.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
