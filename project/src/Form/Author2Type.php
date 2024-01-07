<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class Author2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('middleName')

            ->add('books', EntityType::class, [
                'class' => Book::class,
                'choice_label' => 'getTitle',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}
