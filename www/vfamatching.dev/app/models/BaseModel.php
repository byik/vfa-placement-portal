<?php

abstract class BaseModel extends Eloquent
{
	// Force extending class to have a rules function
	abstract private function rules();

	public function save(){
		$validator = Validator::make($this->toArray(),$this->rules());
        if($validator->pass()){
            return parent::save();
        }else{
            throw new ValidationFailedException($validator->messages());
        }
	}
}