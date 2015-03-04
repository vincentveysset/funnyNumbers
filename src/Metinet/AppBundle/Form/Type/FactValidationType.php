<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 03/03/15
 * Time: 17:24
 */

namespace Metinet\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FactValidationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('valid', 'submit')
                ->add('refuse', 'submit');
    }

    public function getName()
    {
        return 'fact';
    }
} 