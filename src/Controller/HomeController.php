<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\SiteContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(Request $request,EntityManagerInterface $manager): Response
    { $contact = new Contact();
        $form=$this->createForm( SiteContactType::class,$contact);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ) {
           $contact = $form->getData();
          $manager->persist($contact);
          $manager->flush();
          $this->addFlash(
              'success',
              'votre demande a été envoyé avec succés '
          );
          return $this->redirectToRoute('tarif');}
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
            'form'=>$form->createView()
        ]);
    }
    
    #[Route('/tarif',name:'tarif')]
    public function tarif():Response
    {
        return $this->render('home/tarif.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    #[Route('/adresses',name:'adresses')]
    public function adresses():Response
    {
        return $this->render('home/adresses.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/propos',name:'propos')]
    public function apropos():Response
    {
        return $this->render('home/propos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


}

