<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Form\SiteContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact', methods:['GET','POST'])]
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
        return $this->redirectToRoute('tarif');
      }




        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form'=>$form->createView()
        ]);
    }


    #[Route('/pagecontact',name:'pagecontact')]
    public function pagecontact():Response
    {
        return $this->render('contact/pagecontact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
