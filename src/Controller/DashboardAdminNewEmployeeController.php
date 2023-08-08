<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DashboardAdminNewEmployeeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/tableau-de-bord-admin/nouvel-employe", name="app_dashboard_admin_new_employee")
     */
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {        
        $employee = new User();
        $employee->setRoles(['ROLE_USER']);
        $form = $this->createForm(UserType::class, $employee);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPassword = $passwordHasher->hashPassword($employee, $employee->getPassword());
            $employee->setPassword($hashedPassword);

            $this->entityManager->persist($employee);
            $this->entityManager->flush();

            return $this->redirectToRoute('dashboard-admin-1');
        }

        return $this->render('dashboard_admin_new_employee.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}