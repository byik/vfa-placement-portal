<?php

abstract class BaseModel extends Eloquent
{
	// Force extending class to have a rules function
	abstract protected function rules();

	public function save(array $options = array()){
		$validator = Validator::make($this->toArray(),$this->rules());
        if($validator->passes()){
            return parent::save($options);
        }else{
            throw new ValidationFailedException($validator->messages());
        }
	}
}