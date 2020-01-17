<?php

namespace addressBook;

class BaseObject {
    public function __construct($data = []) {
        if (!empty($data) && is_array($data)) {
            foreach ($data as $property => $value) {
                $this->$property = $value;
            }
        }
    }
}