<?php

namespace App\Controller;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\SiteContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;

class HomeController extends AbstractController
{
    private $emailSender;

    public function __construct()
    {

    }
    #[Route('/', name: 'accueil')]
    public function index(
        Request $request
        , EntityManagerInterface $manager,
        
    ): Response {
        $contact = new Contact();
        $form = $this->createForm(SiteContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $manager->persist($contact);
            $manager->flush();
        }
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView()
        ]);
    }

    #[Route('/tarif', name: 'tarif')]
    public function tarif(): Response
    {
        return $this->render('home/tarif.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/pageadresses', name: 'pageadresses')]
    public function pageadresse(): Response
    {
        return $this->render('home/pageadresses.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/adresses', name: 'adresses')]
    public function adresses(): Response
    {
        return $this->render('home/adresses.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/propos', name: 'propos')]
    public function apropos(): Response
    {
        return $this->render('home/propos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/contactnav', name: 'contactnav')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',

        ]);
    }


}