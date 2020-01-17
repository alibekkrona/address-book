<?php

namespace addressBook;

class Person extends BaseObject {
    public $id = null;
    public $firstName = '';
    public $lastName = '';
    public $addresses = [];
    public $phoneNumbers = [];
    public $emails = [];
    public $groupsIds = [];

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getGroupsIds() {
        return $this->groupsIds;
    }
}
