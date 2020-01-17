<?php

namespace addressBook;

use addressBook\Person;
use addressBook\Group;
use addressBook\GroupHasPerson;

class AddressBook {
    protected $id = null;
    protected $name = '';
    protected $persons = [];
    protected $groups = [];
    protected $groupHasPerson = [];

    public function __construct($config = null) {
        if (!empty($config)) {
            // set persons
            if (
                array_key_exists('persons', $config)
                && is_array($config['persons'])
                && (count($config['persons']) > 0)
            ) {
                foreach ($config['persons'] as $person) {
                    $personObject = new Person($person);
                    $this->persons[$personObject->id] = $personObject;
                }
            }
            // set groups
            if (
                array_key_exists('groups', $config)
                && is_array($config['groups'])
                && (count($config['groups']) > 0)
            ) {
                foreach ($config['groups'] as $group) {
                    $groupObject = new Group($group);
                    $this->groups[$groupObject->id] = $groupObject;
                }
            }
            // set group has person
            if (
                array_key_exists('groupHasPerson', $config)
                && is_array($config['groupHasPerson'])
                && (count($config['groupHasPerson']) > 0)
            ) {
                foreach ($config['groupHasPerson'] as $groupHasPerson) {
                    $groupHasPersonObject = new GroupHasPerson($groupHasPerson);
                    $this->groupHasPerson[] = $groupHasPersonObject;
                }
            }
        }
    }

    public function getPersons() {
        return $this->persons;
    }

    public function getGroups() {
        return $this->groups;
    }

    public function getGroupHasPerson() {
        return $this->groupHasPerson;
    }

    public function addPerson(Person $person) {
        $this->persons[$person->id] = $person;
        // Process person groups
        $this->processPersonGroups($person);
    }

    public function processPersonGroups(Person $person) {
        $personGroupsIds = $person->getGroupsIds();
        if (!empty($personGroupsIds)) {
            foreach ($personGroupsIds as $groupId) {
                if (!$this->isGroupContainsPerson($groupId, $person->id)) {
                    $this->addPersonToGroup($groupId, $person->id);
                }
            }
        }
    }

    public function isGroupContainsPerson($groupId, $personId) {
        $isGroupContainsPerson = false;
        foreach ($this->groupsHasPersons as $relation) {
            if (($groupId == $relation->groupId) && ($personId == $relation->personId)) {
                $isGroupContainsPerson = true;
                break;
            }
        }
        return $isGroupContainsPerson;
    }

    public function addPersonToGroup($groupId, $personId) {
        $groupHasPerson = new GroupHasPerson(['groupId' => $groupId,
            'personId' => $personId]);
        $this->groupHasPerson[] = $groupHasPerson;
    }

    public function addGroup(Group $group) {
        $this->groups[] = $group;
    }

    public function findPersonsByGroup($groupId) {
        $persons = [];
        foreach ($this->groupHasPerson as $relation) {
            if ($relation->groupId == $groupId) {
                $persons[] = $this->persons[$relation->personId];
            }
        }
        return $persons;
    }

    public function findGroupsByPerson($personId) {
        $groups = [];
        foreach ($this->groupHasPerson as $relation) {
            if ($relation->personId == $personId) {
                $groups[] = $this->groups[$relation->groupId];
            }
        }
        return $groups;
    }

    public function findPersonsByName($q = '') {
        $persons = [];
        if (!empty($q)) {
            foreach ($this->persons as $person) {
                if (false !== strpos(strtolower($person->getFullName()), strtolower($q))) {
                    $persons[] = $person;
                }
            }
        }
        return $persons;
    }

    public function findPersonByEmail($q = '') {
        $persons = [];
        if (!empty($q)) {
            foreach ($this->persons as $person) {
                if (false !== strpos(strtolower(implode(' ', $person->emails)), strtolower($q))) {
                    $persons[] = $person;
                }
            }
        }
        return $persons;
    }
}