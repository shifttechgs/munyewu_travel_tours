<?php

// Single source of truth for Munyewu Travel & Tours business facts.
// Mirrors docs/business.md. Keep NAP (name, address, phone) identical everywhere.

return [
    'name' => 'Munyewu Travel & Tours',
    'tagline' => 'Cape Town tours and private transfers',

    'address' => [
        'street' => '45 Heldersig Road',
        'suburb' => 'Thornton',
        'city' => 'Cape Town',
        'country' => 'South Africa',
    ],

    // Display value => tel: value. Numbers verified from docs/business.md.
    'phones' => [
        '+27 79 719 6837' => '+27797196837',
        '+27 79 030 6065' => '+27790306065',
        '+27 67 946 7540' => '+27679467540',
    ],

    // Operator inbox for enquiry notifications.
    // TODO (launch): set MAIL_ENQUIRIES_TO and real SMTP credentials.
    'enquiries_to' => env('MAIL_ENQUIRIES_TO'),

    // Service catalogue. Keys are stored with each enquiry; labels drive the UI.
    'services' => [
        'city-tour' => 'Cape Town city tour',
        'winelands-tour' => 'Winelands tour',
        'airport-transfer' => 'Airport transfer',
        'private-chauffeur' => 'Private chauffeur',
        'other' => 'Something else',
    ],

    // Vehicle categories advertised on the banner (docs/business.md).
    'vehicles' => ['Luxury car', 'SUV', '11-seater'],
];
