<?php
// src/Form/Type/OrderType.php
namespace App\Form;

use App\Form\Type\ShippingType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('us', null, ['label' => ' ', 'attr' => ['placeholder' => 'xong roi ne']])
            ->add('uk')
        ;
    }
}
