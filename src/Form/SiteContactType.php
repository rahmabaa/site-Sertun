<?php

namespace App\Form;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                    'minlenght'=>'2',
                    'maxlenght'=>'20',
                    'placeholder'=>'votre nom'
                ],
                'label'=>'Nom',
                'label_attr'=>[
                       'class'=>'form-label mt-4'
                   ],
                'constraints'=>[
                    new Assert\Length(['min'=>2,'max'=>20])
                ]
            ])
            ->add('prenom',TextType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                    'minlenght'=>'2',
                    'maxlenght'=>'20',
                    'placeholder'=>'votre prénom'
                ],
                'label'=>'Prénom',
                'label_attr'=>[
                       'class'=>'form-label mt-4'
                   ],
                'constraints'=>[
                    new Assert\Length(['min'=>2,'max'=>20])
                ]
            ])
            ->add('email',EmailType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                    'minlenght'=>'2',
                    'maxlenght'=>'180',
                    'placeholder'=>'votre email'
                ],
                'label'=>'Adresse email',
                'label_attr'=>[
                       'class'=>'form-label mt-4'
                   ],
                'constraints'=>[
                    new Assert\NotBlank(),
                    new Assert\Email(),
                    new Assert\Length(['min'=>2,'max'=>180])
                ]
            ])
            ->add('sujet',TextType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                    'minlenght'=>'2',
                    'maxlenght'=>'100',
                    'placeholder'=>"L'objet de votre message"
                ],
                'label'=>'sujet',
                'label_attr'=>[
                       'class'=>'form-label mt-4'
                   ],
                'constraints'=>[
                    new Assert\Length(['min'=>2,'max'=>100])
                ]
            ])
            ->add('message',TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                    'placeholder'=>"Votre message"
                    
                ],
                'label'=>'Message',
                'label_attr'=>[
                       'class'=>'form-label mt-4'
                   ],
                'constraints'=>[
                    new Assert\NotBlank()  
                ]
            ])
            ->add('submit', submitType::class,[
                'attr'=>[
                    'class'=>'btn btn-dark mt-4'
                ],
                'label'=>'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
