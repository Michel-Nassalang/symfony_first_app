<?php

namespace App\Form;

use App\Entity\Rapport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RapportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('statut')
            ->add('usercreate')
            ->add('datecreate')
            ->add('userdelete')
            ->add('datedelete')
            ->add('userupdate')
            ->add('dateupdate')
            ->add('rapport')
            ->add('mntvente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rapport::class,
        ]);
    }
}
