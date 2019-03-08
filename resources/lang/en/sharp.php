<?php

use Code16\Formoj\Models\Field;
use Code16\Formoj\Models\Form;

return [

    'forms' => [
        'no_title' => "(without title)",
        'notification_strategies' => [
            Form::NOTIFICATION_STRATEGY_EVERY => "On every answer",
            Form::NOTIFICATION_STRATEGY_GROUPED => "Once a day",
            Form::NOTIFICATION_STRATEGY_NONE => "Never",
        ],
        'fields' => [
            "title" => [
                "label" => "Title"
            ],
            "description" => [
                "label" => "Description"
            ],
            "published_at" => [
                "label" => "From"
            ],
            "unpublished_at" => [
                "label" => "to"
            ],
            "sections" => [
                "label" => "Sections",
                "add_label" => "Add a section",
                "fields" => [
                    "title" => [
                        "label" => "Title"
                    ],
                    "description" => [
                        "label" => "Description"
                    ]
                ]
            ],
            "success_message" => [
                "label" => "Message displayed after posting the form",
                "help_text" => "This text witl be shown to the user when posting his answer. If let blank, a standard message will be used.",
            ],
            "notifications_strategy" => [
                "label" => "Sending frequency"
            ],
            "administrator_email" => [
                "label" => "Recipient e-mail address"
            ],
            "fieldsets" => [
                "dates" => "Publication dates (optional)",
                "notifications" => "Notifications",
            ],
        ],
        "list" => [
            "columns" => [
                "ref_label" => "Ref",
                "title_label" => "Title",
                "description_label" => "Description",
                "published_at_label" => "publication dates",
                "sections_label" => "Sections",
            ],
            "data" => [
                "dates" => [
                    "both" => "From %s<br>to %s",
                    "from" => "From %s",
                    "to" => "Until %s",
                ]
            ]
        ]
    ],

    'fields' => [
        'types' => [
            Field::TYPE_TEXT => "Simple text",
            Field::TYPE_TEXTAREA => "multi-rows text",
            Field::TYPE_SELECT => "Dropdown list",
            Field::TYPE_HEADING => "Inter-title",
        ],
        'fields' => [
            "label" => [
                "label" => "Label"
            ],
            "type" => [
                "label" => ""
            ],
            "help_text" => [
                "label" => "Help text"
            ],
            "required" => [
                "text" => "Required field"
            ],
            "max_length" => [
                "label" => "Maximum length",
                "help_text" => "In number of chars",
            ],
            "rows_count" => [
                "label" => "Lines number",
            ],
            "multiple" => [
                "text" => "Allow multiple choices"
            ],
            "max_options" => [
                "label" => "Maximum number of choices"
            ],
            "options" => [
                "label" => "Possible values",
                "add_label" => "Add a value",
            ]
        ],
        "list" => [
            "columns" => [
                "type_label" => "",
                "label_label" => "Label",
                "help_text_label" => "Help text",
            ],
            "data" => [
                "label" => [
                    "required" => "required"
                ]
            ]
        ]
    ],

    'answers' => [
        "list" => [
            "columns" => [
                "created_at_label" => "Date",
                "content_label" => "",
            ],
            "data" => [
                "label" => [
                    "required" => "required"
                ]
            ]
        ],
        'commands' => [
            'view' => "View this answer",
            'export' => "Export answers (XLS)",
        ]
    ]

];