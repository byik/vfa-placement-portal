<?php

class ValidationFailedException extends Exception
{

    private $_errorMessages;

    public function __construct($errorMessages) 
    {
        parent::__construct('Model Failed Validation Rules: ' . json_encode($errorMessages->all()), 0, null);

        $this->_errorMessages = $errorMessages; 
    }

    public function getErrorMessages() { return $this->_errorMessages; }
}