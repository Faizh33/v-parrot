<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DashboardEmployeeNewCarController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/tableau-de-bord-employe/nouvelle-voiture", name="app_dashboard_employee_new_car")
     */
    public function index(Request $request): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les images et les lier à la voiture
            $pictures = $form['pictures']->getData();
            foreach ($pictures as $picture) {
                if ($picture instanceof UploadedFile) {
                    $fileName = md5(uniqid()) . '.' . $picture->guessExtension();
                    $picture->move(
                        $this->getParameter('pictures_directory'),
                        $fileName
                    );
                    // Ajouter le nom du fichier à l'entité Car
                    $car->addPictureName($fileName);
                }
            }

            // Récupérer les options saisies dans le formulaire et les ajouter à l'entité Car
            $options = $form['carOptions']->getData();
            foreach ($options as $option) {
                $car->addCarOption($option);
            }

            // Persister la voiture et les entités associées
            $this->entityManager->persist($car);
            $this->entityManager->flush();

            // Ajouter un message flash et rediriger
            $this->addFlash('success', 'La nouvelle voiture a été enregistrée avec succès.');
            return $this->redirectToRoute('dashboard-employe-2');
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Il y a des erreurs dans le formulaire. Veuillez le corriger.');
        }

        return $this->render('dashboard_employee_new_car.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
