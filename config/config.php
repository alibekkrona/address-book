<?php

$config = [
    // 'id' => '1', // AddressBook id
    // 'name' => 'Department List', // AddressBook name
    'groups' => [
        '1' => [
            'id' => '1',
            'name' => 'Group1'
        ],
        '2' => [
            'id' => '2',
            'name' => 'Group2'
        ],
    ],
    'persons' => [
        '1' => [
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
        ],
        '2' => [
            'id' => '2',
            'firstName' => 'Mark A',
            'lastName' => 'Smith',
            'addresses' => [
                [
                    'line1' => '614 Church St S',
                    'line2' => '',
                    'zip' => '25271',
                    'city' => 'Ripley',
                    'state' => 'WV',
                    'countryCode' => 'US'
                ],
            ],
            'phoneNumbers' => [
                '+1(919) 471-8599'
            ],
            'emails' => [
                'markASmith@email.fake'
            ],
        ],
    ],
    'groupHasPerson' => [
        ['groupId' => '1', 'personId' => '1'],
        ['groupId' => '1', 'personId' => '2'],
        ['groupId' => '2', 'personId' => '2'],
    ]
];