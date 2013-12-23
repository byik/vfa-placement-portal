<?php

class DropdownItem {
    function __construct($label, $url, $icon = null) {
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
    }
}