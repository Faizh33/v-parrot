<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdminEmployeeController extends AbstractController
{
    private $userRepository;
    private $entityManager;

    public function __construct(userRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/tableau-de-bord-admin/moderer-les-employes", name="app_dashboard_admin_employee")
     */
    public function index(): Response
    {
        $users = $this->userRepository->findAll();

        return $this->render('dashboard_admin_employees.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/update-user/{id}", name="update_user", methods={"POST"})
     */
    public function updateUser(Request $request, $id): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['firstName']) || !isset($data['lastName']) || !isset($data['email'])) {
            return new JsonResponse(['success' => false, 'message' => 'Donnée invalide'], 400);
        }

        $user = $this->userRepository->find($id);

        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'Employé introuvable'], 404);
        }

        $user->setFirstName($data['firstName']);
        $user->setLastName($data['lastName']);
        $user->setEmail($data['email']);

        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return new JsonResponse(['success' => true], 200);
        } catch (\Exception $e) {

            return new JsonResponse(['success' => false, 'message' => 'Erreur de mise à jour de l\'employé(e)'], 500);
        }
    }

    /**
     * @Route("/delete-user/{id}", name="delete_user", methods={"DELETE"})
     */
    public function deleteUser($id): JsonResponse
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }

        try {
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            return new JsonResponse(['success' => true], 200);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => 'Erreur de suppression de l\'utilisateur'], 500);
        }
    }
}