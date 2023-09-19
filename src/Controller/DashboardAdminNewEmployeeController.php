<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class DashboardAdminNewEmployeeController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-admin/nouvel-employe", name="dashboard-admin-3")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {        
        $employee = new User();
        $form = $this->createForm(UserType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employee->setPassword(
                $userPasswordHasher->hashPassword(
                    $employee,
                    $form->get('password')->getData()
                )
            );

            $employee->setRoles(['ROLE_USER']);
            $entityManager->persist($employee);
            $entityManager->flush();
            
            $this->addFlash('success', "L'employé(e) à été ajouté(e) en base de données.");

            return $this->redirectToRoute('dashboard-admin-3');

            return $userAuthenticator->authenticateUser(
                $employee,
                $authenticator,
                $request
            );
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Il y a des erreurs dans le formulaire. Veuillez le corriger.');
        }

        return $this->render('dashboard_admin_new_employee.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}