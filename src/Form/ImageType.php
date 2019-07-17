<?php
// src/Form/Type/OrderType.php
namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\CallbackTransformer;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder->add('imageFile', VichImageType::class);
		// $builder->addModelTransformer(new CallbackTransformer(
  //               function ($data) {
	 //                 dump($data);
  //               },
  //               function ($data) {
  //                   dump($data);
  //               }
  //       ));
    }

     /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefaults([
    		'data_class' => Image::class,
    	]);
    }
}
