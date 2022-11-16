<?php

namespace App\Form;

use App\Entity\Intervention;
use App\Entity\Patient;
use Proxies\__CG__\App\Entity\Medecin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateInter')
            ->add('descriptions')
          ->add('idPatien',EntityType::class,[
            'class'=>Patient::class,'choice_label'=>'idPatient'
          ] )
          ->add('idMed',EntityType::class,[
            'class'=>Medecin::class,'choice_label'=>'idMed'
          ] )
       
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}
