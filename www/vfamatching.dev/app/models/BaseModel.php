<?php

abstract class BaseModel extends Eloquent
{
	// Force extending class to have a rules function
	abstract protected function rules();
    // and an admin rules function
    abstract protected function adminRules();

	public function save(array $options = array()){
        if(!empty($options['adminValidation']) && $options['adminValidation'] == true){
            $validator = Validator::make($this->toArray(),$this->adminRules());
        } else {
            $validator = Validator::make($this->toArray(),$this->rules());
        }
        if($validator->passes()){
            return parent::save($options);
        } else {
            throw new ValidationFailedException($validator->messages());
        }
	}
}