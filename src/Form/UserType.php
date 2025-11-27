<?php

namespace App\Form;

use App\Entity\Proyecto;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('nombre')
            ->add('apellidos')
            ->add('referencia')
            ->add('telefono')
            ->add('procedencia')
            ->add('foto')
            ->add('destino_ida')
            ->add('transporte_ida')
            ->add('salida_time_ida')
            ->add('llegada_time_ida')
            ->add('lugar_vuelta')
            ->add('transporte_vuelta')
            ->add('salida_time_vuelta')
            ->add('llegada_time_vuelta')
            ->add('created_at')
            ->add('updated_at')
            ->add('proyecto', EntityType::class, [
                'class' => Proyecto::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
