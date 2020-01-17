<?php
use PHPUnit\Framework\TestCase;
use addressBook\AddressBook;

require_once './config/config.php';

class AddressBookTest extends TestCase
{
    public function testAddPerson()
    {
        $addressBook = new AddressBook();
        $personConfig = [
            'id' => '1',
            'firstName' => 'David A',
            'lastName' => 'Johnson',
            'addresses' => [
                [
                    'line1' => '5659 Centerville Prospect Rd',
                    'line2' => '',
                    'zip' => '43342',
                    'city' => 'Prospect',
                    'state' => 'OH',
                    'countryCode' => 'US'
                ],
            ],
            'phoneNumbers' => [
                '+1(740) 494-2030'
            ],
            'emails' => [
                'davidAjohnson@email.fake'
            ],
        ];
        $person = new Person($personConfig);
        $addressBook->addPerson($person);
        $persons = $addressBook->getPersons();

        $this->assertSame(1, count($persons));
    }

    public function testAddGroup() {
        $addressBook = new AddressBook();
        $groupConfig = [
            '1' => [
                'id' => '1',
                'name' => 'Group1'
            ],
        ];
        $group = new Group($groupConfig);
        $addressBook->addGroup($group);
        $groups = $addressBook->getGroups();
        $this->assertSame(1, count($groups));
    }

    public function testFindGroupPersons() {
        $addressBook = new AddressBook($config);
        $groupId = '1';
        $persons = $addressBook->findPersonsByGroup($groupId);
        $this->assertSame(2, count($persons));
    }

    public function testFindGroupPersonsBelong() {
        $addressBook = new AddressBook($config);
        $groupId = '1';
        $groups = $addressBook->findGroupsByPerson($groupId);
        $this->assertSame(1, count($groups));
    }

    public function testFindPersonByName() {
        $addressBook = new AddressBook($config);
        $persons = $addressBook->findPersonByName('John');
        $this->assertSame(1, count($persons));
    }

    public function testFindPersonByEmail() {
        $addressBook = new AddressBook($config);
        $persons = $addressBook->findPersonByEmail('John');
        $this->assertSame(1, count($persons));
    }

}