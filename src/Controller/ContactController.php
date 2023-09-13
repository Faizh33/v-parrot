<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\GarageState;
use App\Repository\GarageStateRepository;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request): Response
    {
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

            return $this->redirectToRoute('contact');
        }

        $repository = $this->entityManager->getRepository(GarageState::class);
        $status = $repository->find(1)->getStatus();

        return $this->render('contact.html.twig', [
            'status' => $status,
            'form' => $form->createView(),
        ]);
    }
}
