<?php

namespace addressBook;

class GroupHasPerson {
    public $personId = null;
    public $groupId = null;

    public function __construct($relation) {
        if (!empty($relation)) {
            if (
                (isset($relation['personId']) && !empty($relation['personId']))
                && (isset($relation['groupId']) && !empty($relation['groupId']))
            ) {
                $this->personId = $relation['personId'];
                $this->groupId = $relation['groupId'];
            }
        }
    }
}

