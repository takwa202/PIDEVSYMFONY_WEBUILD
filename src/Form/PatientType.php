<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPatient')
            ->add('prénomPatient')
            ->add('emailPatient')
            ->add('adressPatient')
            ->add('numtelPatient')
            ->add('motdepasselPatient')
            ->add('agePatient')
            ->add('gendrePatient')
            ->add('isblokedpatient')
            ->add('nbRdv')
            ->add('nbAchat')
            ->add('nbReclamation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
