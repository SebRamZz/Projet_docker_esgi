<?php

namespace App\Form;

use App\Entity\Todo;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'attr' => [
                    'placeholder' => 'Entrez le nom de l\'action'
                ],
            ])
            ->add('description', null, [
                'attr' => [
                    'placeholder' => 'Entrez la description de l\'action'
                ],
            ])
            ->add('status', ChoiceType::class, [
                'attr' => [
                    'placeholder' => 'Choisissez le statut de l\'action'
                ],
                'choices' => [
                    'À faire' => 'À faire',
                    'En cours' => 'En cours',
                    'Terminer' => 'Terminer',
                    'Bloquer' => 'Bloquer'
                ],
                'multiple' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
