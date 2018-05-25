<?php

namespace App\Form;

use App\Entity\Localidad;
use App\Entity\Provincia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LocalidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('area')
            ->add('habitantes')
            ->add('cp')
            ->add('provincia')
            ->add('Guardar', SubmitType::class, array('attr' => array('class' => 'btn btn-success'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Localidad::class,
        ]);
    }
}
