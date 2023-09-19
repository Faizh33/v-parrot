<?php

namespace App\Controller;

use App\Entity\Repair;
use App\Repository\RepairRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminModerateServiceController extends AbstractController
{
    private $repairRepository;
    private $entityManager;

    public function __construct(RepairRepository $repairRepository, EntityManagerInterface $entityManager)
    {
        $this->repairRepository = $repairRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/tableau-de-bord-admin/moderer-les-services", name="dashboard-admin-4")
     */
    public function index(): Response
    {
        $repairs = $this->repairRepository->findAll();

        return $this->render('dashboard_admin_moderate_service.html.twig', [
            'repairs' => $repairs,
        ]);
    }

    /**
     * @Route("/update-repair/{id}", name="update_repair", methods={"POST"})
     */
    public function updateRepair(Request $request, int $id): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['title']) || !isset($data['description'])) {
            return new JsonResponse(['success' => false, 'message' => 'Donnée invalide'], 400);
        }

        $repair = $this->repairRepository->find($id);

        if (!$repair) {
            return new JsonResponse(['success' => false, 'message' => 'Service introuvable'], 404);
        }

        $repair->setTitle($data['title']);
        $repair->setDescription($data['description']);

        try {
            $this->entityManager->persist($repair);
            $this->entityManager->flush();

            return new JsonResponse(['success' => true], 200);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => 'Erreur de mise à jour du service'], 500);
        }
    }

    /**
     * @Route("/delete-repair/{id}", name="delete_repair", methods={"DELETE"})
     */
    public function deleteRepair(int $id): JsonResponse
    {
        $repair = $this->entityManager->getRepository(Repair::class)->find($id);

        if (!$repair) {
            return new JsonResponse(['success' => false, 'message' => 'Service non trouvé'], 404);
        }

        try {
            $this->entityManager->remove($repair);
            $this->entityManager->flush();

            return new JsonResponse(['success' => true], 200);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => 'Erreur de suppression du service'], 500);
        }
    }
}