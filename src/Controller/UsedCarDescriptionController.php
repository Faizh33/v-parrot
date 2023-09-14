<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;

class UsedCarDescriptionController extends AbstractController
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    /**
     * @Route("/voitures-occasion/{id}", name="app_used_car_description")
     */
    public function index(Request $request, $id): Response
    {
        $carRepository = $this->entityManager->getRepository(Car::class);
        $car = $carRepository->find($id);

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

        // Envoi de l'e-mail
        $email = (new Email())
        ->from('v.parrot@hotmail.com')
        ->to('v.parrot@hotmail.com')
        ->subject('Nouveau message de contact n°' . $contact->getId())
        ->html(
            '<p><b>Nom : </b>' . $contact->getLastName() . ' ' . $contact->getFirstName() . '<br><b>Email : </b>' . $contact->getEmail() . '<br><b>Téléphone : </b>' . $contact->getPhone() . '<br><br><b>Message : </b>' . $contact->getMessage() . '</p>'
        );

        $this->mailer->send($email);

        $this->addFlash('success', 'Votre message a été posté, nous vous répondrons dans les plus brefs délais. Bonne journée :)');

            return $this->redirectToRoute('app_used_car_description');
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Il y a des erreurs dans le formulaire. Veuillez le corriger.');
        }

        return $this->render('used_car_description.html.twig', [
            'car' => $car,
            'form' => $form->createView(),
        ]);
    }
}
