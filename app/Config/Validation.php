<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $task = [
        'taskartenid' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Bitte wählen Sie eine Taskart aus.',
                'integer'  => 'Ungültige Taskart-Auswahl.'
            ]
        ],
        'personenid' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Bitte wählen Sie eine Person aus.',
                'integer'  => 'Ungültige Person-Auswahl.'
            ]
        ],
        'spaltenid' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Bitte wählen Sie eine Spalte aus.',
                'integer'  => 'Ungültige Spalten-Auswahl.'
            ]
        ],
        'tasks' => [
            'rules' => 'required|string|max_length[255]',
            'errors' => [
                'required'   => 'Bitte geben Sie eine Taskbezeichnung an.',
                'max_length' => 'Die Taskbezeichnung darf maximal 255 Zeichen lang sein.'
            ]
        ],
    ];

    public array $spalte = [
        'boardsid' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Bitte wählen Sie ein Board aus.',
                'integer'  => 'Ungültige Board-Auswahl.'
            ]
        ],
        'spalte' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte geben Sie eine Spaltenbezeichnung an.'
            ]
        ],
        'spaltenbeschreibung' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte geben Sie eine Spaltenbeschreibung an.'
            ]
        ],
        'sortid' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Bitte geben Sie eine Sortid an.',
                'integer'  => 'Die Sortid muss eine Zahl sein.'
            ]
        ],
    ];

    public array $board = [
        'board' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte geben Sie eine Bezeichnung für das Board an.'
            ]
        ],
    ];
}
