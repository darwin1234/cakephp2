<?php
use Cake\Core\Configure;
 
return [
    'HybridAuth' => [
        'providers' => [
            'Facebook' => [
                'enabled' => true,
                'keys' => [
                    'id' => '2011871525600386',
                    'secret' => 'facebook-secret-key'
                ],
                'scope' => 'email, public_profile'
            ]
        ]
    ],
];