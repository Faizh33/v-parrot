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
    /**
     * @Route("/tableau-de-bord-admin/nouvel-employe", name="app_dashboard_admin_new_employee")
     */
     public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
     {        
         $employee = new User();
         $form = $this->createForm(UserType::class, $employee);
         $form->handleRequest($request);
     
         if ($form->isSubmitted() && $form->isValid()) {
             // Vérifiez si l'email existe déjà en base de données
             $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $employee->getEmail()]);
             if ($existingUser) {
                 // Ajoutez un message d'erreur
                 $this->addFlash('error', 'Cet email existe déjà en base de données.');
             } else {
                 // Si l'email n'existe pas, continuez avec la persistance de l'utilisateur
                 $employee->setPassword(
                     $userPasswordHasher->hashPassword(
                         $employee,
                         $form->get('password')->getData()
                     )
                 );
     
                 $employee->setRoles(['ROLE_USER']);
                 $entityManager->persist($employee);
                 $entityManager->flush();
                 
                 $this->addFlash('success', "L'employé(e) a été ajouté(e) en base de données.");
     
                 return $this->redirectToRoute('dashboard-admin-3');
             }
         } elseif ($form->isSubmitted() && !$form->isValid()) {
             $this->addFlash('error', 'Il y a des erreurs dans le formulaire. Veuillez le corriger.');
         }
     
         return $this->render('dashboard_admin_new_employee.html.twig', [
             'form' => $form->createView(),
         ]);
     }
}