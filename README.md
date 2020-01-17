<h1>AddressBook extention</h1>
<p>
This is AddressBook extension</p>
<h2>Installation</h2>
<p>The preferred way to install the AddressBook extension is through
<a href="https://getcomposer.org/download/">Composer</a></p>
<h2>Documentation and features</h2>
<h3>config</h3>
<p>config/config.php can be use as pre set data for default address book</p>
<code>
$config = [<br/>
    'groups' => [...],<br/>
    'persons' => [...], <br/>
    'groupHasPerson' => [...] <br/>
    ];
</code>
<p>Can be used few configs for different types of address books</p>
<p>AddressBook have $id and $name fields for scale features</p>
<h3>Init AddressBook</h3>
<p>
<code>
require_once './vendor/addressBook/config/config.php';<br/>
use vendor\addressBook\AddressBook;<br/>
$addressBook = new AddressBook($config);
</code></p>
<h3>Add a person to the address book.</h3>
<p><code>
$addressBook = new AddressBook();
$personConfig = [<br/>
    'id' => '1',<br/>
    'firstName' => 'David A',<br/>
    'lastName' => 'Johnson',<br/>
    'addresses' => [<br/>
        [<br/>
            'line1' => '5659 Centerville Prospect Rd',<br/>
            'line2' => '',<br/>
            'zip' => '43342',<br/>
            'city' => 'Prospect',<br/>
            'state' => 'OH',<br/>
            'countryCode' => 'US'<br/>
        ],<br/>
    ],<br/>
    'phoneNumbers' => [<br/>
        '+1(740) 494-2030'<br/>
    ],<br/>
    'emails' => [<br/>
        'davidAjohnson@email.fake'<br/>
    ],<br/>
];<br/>
$person = new Person($personConfig);<br/>
$addressBook->addPerson($person);<br/>
</code></p>
<h3>Add new group to AddressBook</h3>
<p><code>
$addressBook = new AddressBook();<br/>
$groupConfig = [<br/>
    '1' => [
        'id' => '1',
        'name' => 'Group1'
    ],<br/>
];<br/>
$group = new Group($groupConfig);<br/>
$addressBook->addGroup($group);<br/>
</code></p>
<h3>Given a group we want to easily find its members.</h3>
<p><code>
$addressBook = new AddressBook($config);<br/>
$groupId = '1';<br/>
$persons = $addressBook->findPersonsByGroup($groupId);<br/>
</code></p>
<h3>Given a person we want to easily find the groups the person belongs to.</h3>
<p><code>
$addressBook = new AddressBook($config);<br/>
$groupId = '1';<br/>
$groups = $addressBook->findGroupsByPerson($groupId);<br/>
</code></p>
<h3>Find person by name (can supply either first name, last name, or both).</h3>
<p><code>
$addressBook = new AddressBook($config);<br/>
$persons = $addressBook->findPersonByName('John');</code></p>
<h3>Find person by email address</h3>
<p><code>
$addressBook = new AddressBook($config);<br/>
$persons = $addressBook->findPersonByEmail('john');
</code></p>