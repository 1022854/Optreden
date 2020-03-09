<?php

namespace App\Form;

use App\Entity\Optreden;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptredenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artiest_id')
            ->add('aanvang')
            ->add('datum')
            ->add('zaal')
            ->add('maxseats')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Optreden::class,
        ]);
    }
}
