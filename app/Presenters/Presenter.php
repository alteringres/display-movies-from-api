<?php 
namespace App\Presenters;
use App\Presenters\PresentableInterface;
/**
 * inspired by laracast training on presenters
 * https://github.com/laracasts/Presenter
 */
abstract class Presenter {
	/**
	 * @var mixed
	 */
	protected $entity;
	/**
	 * @param $entity
	 */
	function __construct(PresentableInterface $entity)
	{
		$this->entity = $entity;
	}
	/**
	 * Allow for property-style retrieval
	 *
	 * @param $property
	 * @return mixed
	 */
	public function __get($property)
	{
		if (method_exists($this, $property))
		{
			return $this->{$property}();
		}
		return $this->entity->{'get'.ucfirst($property)}();
	}
} 