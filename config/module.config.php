<?php
return [

    /**
     * Configuration for JIRA API
     */
    'Reliv\RcmJira' => [
        'api' => [
            'endpoint' => 'https://jira.example.com',
            'username' => 'myUsername',
            'password' => 'myPassword',
        ],
        'JiraLoggerOptions' => [
            /* Options */

            // Issue will be entered in this project
            'projectKey' => 'REF',

            // Will not enter an issue if one is found in these projects
            // (includes the project above)
            'projectsToCheckForIssues' => [
                //'ISS' => 'ISS'
            ],

            // Will only enter an issue if one is not found in the projects
            // that is NOT in one of the status below
            'enterIssueIfNotStatus' => [
                'closed' => 'closed',
                'resolved' => 'resolved',
            ],

            // Include dump of server vars - true to include server dump
            'includeServerDump' => true,

            // WARNING: this can be a security issue
            // Set to an array of specific session keys to display or 'ALL' to display all
            'includeSessionVars' => false,

            // This is useful for preventing exceptions who have dynamic
            // parts from creating multiple entries
            // Descriptions will be run through preg_replace
            // using these as the preg_replace arguments.
            'summaryPreprocessors' => [
                // $pattern => $replacement
            ]
            /* */
        ],
    ],

    'service_manager' => [
        'factories' => [
            'Reliv\RcmJira\Api' => 'Reliv\RcmJira\Factory\JiraApiFactory',
            'Reliv\RcmJira\JiraLogger' => 'Reliv\RcmJira\Factory\JiraLoggerFactory',
        ]
    ],
];
