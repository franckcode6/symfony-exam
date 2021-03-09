<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        /*//On crée un nouvel objet Contact
        $contact = new Contact();
        //On assigne des valeurs à cet objet, on passe des paramètres à notre requête
        $contact->setEmail('test@test.com');
        $contact->setSubject('Ceci est un test');
        $contact->setMessage('Un message de test, pouvant être long, ou non. Celui-ci ne l\'est pas :) .');

        //On indique à doctrine via EntityManager qu'on va garder cet objet pour l'envoyer en BDD
        $entityManager->persist($contact);
        //On dit à doctrine d'executer la requete, comme un INSERT
        $entityManager->flush();

        //A la fin on demande à être redirigé sur la page d'acceuil une fois la requete executée
        return $this->redirectToRoute('default_index');*/

        $contact = new Contact;

        $form = $this->createForm(ContactType::class, $contact, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('default_index');
        }

        return $this->render('default/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
