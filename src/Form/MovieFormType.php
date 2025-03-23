<?php

namespace App\Form;



use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;





class MovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => array(
                    'class'  => 'bg-transparent block border-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Enter title'              
                ),
                'label'=> 'Title',
                'required'=> false,
            ])
            ->add('director', TextType::class, [
                'attr' => array(
                    'class'  => 'bg-transparent block border-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Enter director'              
                ),
                'label'=> 'Director',
                'required'=> false,
                
            ])

            ->add('RunningTime', IntegerType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block mt-10 border-b-2 w-full h-20 text-6xl outline-none',
                    'placeholder' => 'Enter Running time'
                ),
                'label' => false,
                'required' => false
            ])
           
            ->add('reviewer',TextType::class, [
                'attr' => array(
                    'class'  => 'bg-transparent block border-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Enter reviewer name'              
                ),
                'label'=> 'Reviewer',          
                'required'=> false, 
                    
            ])
            ->add('review', TextAreaType::class, [
                'attr' => array(
                    'class'  => 'bg-transparent block border-b-2 w-full h-50 outline-none',
                    'placeholder' => 'Write review'              
                ),


                'label'=> 'Review',
                 'required'=> false,
            ])
            ->add('ImagePath', FileType::class, array (
             'required' => false,
             'mapped' => false,
            
            ),
          
            )

           

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
