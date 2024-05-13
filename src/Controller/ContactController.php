<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Form\SiteContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class ContactController extends AbstractController
{   
    #[Route('/contact', name: 'contact', methods:['GET','POST'])]
    public function index(Request $request
    ,EntityManagerInterface $manager,
    MailerInterface $mailer
    ): Response
    { 
        $contact = new Contact();
        $form=$this->createForm( SiteContactType::class,$contact);
     $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
           $contact = $form->getData();
  
          $manager->persist($contact);
          $manager->flush(); 
          //email
          $email = (new TemplatedEmail())
          ->from($contact->getEmail())
          ->to('benattiarahma0@gmail.com')
          //->cc('cc@example.com')
          //->bcc('bcc@example.com')
          //->replyTo('fabien@example.com')
          //->priority(Email::PRIORITY_HIGH)
          ->subject($contact->getSujet())
          ->text($contact->getMessage())
          ->htmlTemplate('contact/email.html.twig')
          ;
      try {
          $mailer->send($email);
      } catch (TransportExceptionInterface $error) {
          echo $error;
      }
      $this->addFlash(
          'success',
          'votre demande a été envoyé avec succés '
      );
      return $this->redirectToRoute('accueil');
    }
         
  
    

      return $this->render('contact/formulairecontact.html.twig', [
            'controller_name' => 'ContactController',
            'form'=>$form->createView()
            
        
        ]);
    }
   
    

      
    // }*/
    // 
    #[Route('/pagecontact',name:'pagecontact')]
    public function pagecontact():Response
    {
        return $this->render('contact/pagecontact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    
}

