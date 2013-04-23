<?php

namespace StartPack\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'colonneId',
                'text',
                array(
                    'label'     => 'Colonne'
                )
            )
            ->add(
                'module',
                'entity',
                array (
                    'class'     => 'CMSBundle:Module',
                    'property'  => 'nom',
                )
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StartPack\CMSBundle\Entity\PageModule'
        ));
    }

    public function getName()
    {
        return 'startpack_cmsbundle_pagemoduletype';
    }
}
