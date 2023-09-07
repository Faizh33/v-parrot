<?php

namespace App\Controller;

use App\Entity\GarageState;
use App\Repository\GarageStateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/dashboard-admin-1", name="app_dashboard_admin")
     */
    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            if ($request->request->has('ouvert')) {
                $status = 'ouvert';
                $this->deleteOldGarageStates();
            } elseif ($request->request->has('fermer')) {
                $status = 'fermé';
                $this->deleteOldGarageStates();
            } else {
                $status = '{statut inconnu}';
                $this->deleteOldGarageStates();
            }

            $garageState = new GarageState();
            $garageState->setStatus($status);

            $this->entityManager->persist($garageState);
            $this->entityManager->flush();
        }

        $repository = $this->entityManager->getRepository(GarageState::class);
        $status = $repository->find(1)->getStatus();

        return $this->render('dashboard_admin.html.twig', [
            'status' => $status,
        ]);
    }

    private function deleteOldGarageStates(): void
    {
        // Obtenez le référentiel des anciennes données de GarageState
        $garageStateRepository = $this->entityManager->getRepository(GarageState::class);

        // Supprimez toutes les anciennes données
        $garageStateRepository->createQueryBuilder('g')
            ->delete()
            ->getQuery()
            ->execute();

        $query = 'ALTER TABLE garage_state AUTO_INCREMENT = 1';
        $connection = $this->entityManager->getConnection();
        $connection->executeStatement($query);
    }
}

