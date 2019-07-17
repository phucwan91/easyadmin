<?php
// src/Form/Type/OrderType.php
namespace App\Form;

use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;

class OrderType extends AbstractType
{
	const COUNTRIES = ['en', 'fr'];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	foreach (static::COUNTRIES as $key => $country) {
    		$builder->add($country, ImageType::class);
    	}

    	$builder->addModelTransformer(new CallbackTransformer(
            function ($data) {
				foreach ($data->getValues() as $key => $value) {
					 $data->set(static::COUNTRIES[$key], $value);
					 $data->remove($key);
				}
				
				return $data;
            },
            function ($data) {
                return array_values($data->toArray());
            }
        ));
    }
}
