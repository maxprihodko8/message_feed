<?php
return [
    'app' => [
        'feed_limit' => '25',
        'language' => 'en',
        'use_auth' => 'twitter',
    ],
    'social' => [
        'credentials' => [
            'twitter' => [
                'oauth' => 'Abraham\\TwitterOAuth\\TwitterOAuth',
                'class' => '\\src\\feed\\client\\TwitterClient',
                'secret' => [
                    'twitter_key' => '%twitter_key%',
                    'twitter_secret' => '%twitter_secret%',
                    'twitter_oauth_token' => '%twitter_oauth_token%',
                    'twitter_oauth_token_secret' => '%twitter_oauth_token_secret%',
                ],
            ],
        ],
    ],
];