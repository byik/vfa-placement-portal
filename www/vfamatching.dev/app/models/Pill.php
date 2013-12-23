<?php

class Pill {
    function __construct($label, array $dropdownItems) {
        $this->label = $label;
        $this->dropdownItems = $dropdownItems;
    }
}