<?php

namespace App\Form;

use App\Entity\Pais;
use App\Entity\Region;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class PaisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('continente')
            ->add('regiones',EntityType::class,array(
                'class' => Region::class,
                'choice_label' => function ($region) {
                    return $region->getNombre();
            }))
            ->add('Guardar', SubmitType::class, array('attr' => array('class' => 'btn btn-success'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pais::class,
        ]);
    }
}
