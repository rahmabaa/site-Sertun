<?php

namespace App\Controller;
use App\Entity\TarifAdmin;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ContactRepository;
use App\Repository\TarifAdminRepository;
use App\Entity\Contact;
use App\Form\TarifAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/accueiladmin', name: 'accueiladmin')]
    public function index(ContactRepository $repository,
     PaginatorInterface $paginator, 
     Request $request):Response
    {
        $contact=$paginator->paginate($repository->findAll(),
            $request->query->getInt('page', 1)
            ,
            5
        );
        return $this->render('admin/accueilAdmin.html.twig', [
            'controller_name' => 'AdminController',
            'contacts' => $contact,
        ]);
    }


////////////////////////////////////////////
    #[Route('/Tarifadmin', name: 'Tarifadmin')]
    public function TarifAdmin(Request $request,
    EntityManagerInterface $manager):Response
    {
        $tarif = new TarifAdmin();
        $form=$this->createForm(TarifAdminType::class,$tarif);
     $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
           $tarif = $form->getData();
  
          $manager->persist($tarif);
          $manager->flush();
        }

        return $this->render('admin/TarifAdmin.html.twig', [
            'controller_name' => 'AdminController',
            'form'=>$form->createView(),
        
        ]);
    
}
}
