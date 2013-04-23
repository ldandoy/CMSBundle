<?php

namespace StartPack\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageModuleContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('valeur')
            ->add('pageModule')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StartPack\CMSBundle\Entity\PageModuleContent'
        ));
    }

    public function getName()
    {
        return 'startpack_cmsbundle_pagemodulecontenttype';
    }
}
