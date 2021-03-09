<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/default")
     */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_index")
     */
    public function index(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();
        return $this->render('default/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * @Route("/contact", name="default_contact")
     */
    public function new(EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $contact->setEmail('test@test.com');
        $contact->setSubject('Ceci est un test');
        $contact->setMessage('Un message de test, pouvant être long, ou non. Celui-ci ne l\'est pas :) .');

        $entityManager->persist($contact);
        $entityManager->flush();

        return $this->redirectToRoute('default_index');
    }
}
