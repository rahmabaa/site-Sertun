<?php

namespace App\Form;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use App\Entity\TarifAdmin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarifAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('prix',NumberType::class,[
            'attr'=>[
                'class'=>'form-control '
                
            ],   
            'label'=>'prix',
            'label_attr'=>[
                'class'=>'form-label mt-4'
            ],
            'constraints'=>[
                new Assert\LessThan(2000),
                new Assert\Positive()
            ] 
       
            ])
        ->add('offre', ChoiceType::class,[
            'attr'=>[
                'class'=>'form-check-label mt-4 '
                
            ],
            'label'=>'offre',
            'label_attr'=>[
                'class'=>'form-check-label mt-4'
            ],
            'choices'  =>
        [
            'Adresses administratives' =>'Adresses administratives',
            'Adresses juridique'=>"Adresses juridique",
            'Notification par mail lors de la réception du courrier' => 3,
            'Mise à disposition d\'un espace de réunion gratuit' =>4,
            'Scan et envoie de votre courrier par email' => 5,
            'Renvoi de votre courrier vers l\'adresse de votre choix' => 6,
            'Signature des documents à votre place si vous êtes hors du Tunisie' => 7,
            'kkkkkkkkkkkkk'=>8,
            'lllllllllllllll'=>9,
            'bbbbbbbbbbbbbbbbbb'=>10,
            'aaaaaaaaaaaaaaaaaaaaaaaaaaaa'=>11,
            
        ],
        'multiple'=>true,
        'expanded'=>true,
        'empty_data'=> 9,

        ])
        ->add('submit',submitType::class,[
            'attr'=>[
                'class'=>'btn btn-dark mt-4'
            ],
            'label'=>'Ajouter'])
    ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TarifAdmin::class,
        ]);
    }
}
