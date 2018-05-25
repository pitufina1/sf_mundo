<?php

namespace App\Form;

use App\Entity\Region;
use App\Entity\Provincia;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('idioma')
            ->add('provincias',EntityType::class,array(
                'class' => Provincia::class,
                'choice_label' => function ($provincia) {
                    return $provincia->getNombre();
            }))
            ->add('Guardar', SubmitType::class, array('attr' => array('class' => 'btn btn-success'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Region::class,
        ]);
    }
}
