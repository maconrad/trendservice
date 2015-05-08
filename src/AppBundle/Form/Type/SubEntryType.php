<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of EntryTextType
 *
 * @author mconrad
 */
class SubEntryType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('content')
            ->add('contentNoTrans');;
    }
    
     /*
     * Used if defined as a service so that it can be referenced/loaded like this
     */
    public function getName()
    {
        return 'entryText';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) 
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SubEntry',
            'attr'=>array('novalidate'=>'novalidate')
        ));
    }
}
