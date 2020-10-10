<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    |
    | In here you can define all the settings used in your app, it will be
    | available as a settings page where user can update it if needed
    | create sections of settings with a type of input.
    */
    'empresa' => [

        'title' => 'Seleccion de Empresas, Año, Mes ',
        'desc' => 'Configuraciones de datos y periodo para la aplicación',
        'icon' => 'fas fa-building',

        'elements' => [
            [
                'type' =>  '_textreadonly',
                'data' => 'string', // data type, string, int, boolean
                'name' => 'company', // unique name for field
                'label' => 'Nombre Empresa',
                'rules' => 'required', // validation rule of laravel
//                'class' => 'w-auto px-2', // class for input mas corto

            ],
            [
                'type' => '_textreadonly',
                'data' => 'int',
                'name' => 'id_empresa',
                'label' => 'Numero Empresa',
                'rules' => 'required|numeric|min:1',
                'value' => 'company'
            ],

                [
                    'type' => 'select',
                    'data' => 'string',
                    'name' => 'ano',
                    'label' => 'Año',
                    'rules' => 'required',
                    'class' => 'w-auto px-2',
                    'options' => [
                        '2005'     =>'2005',
                        '2006'     =>'2006',
                        '2007'     =>'2007',
                        '2008'     =>'2008',
                        '2009'     =>'2009',
                        '2010'     =>'2010',
                        '2011'     =>'2011',
                        '2012'     =>'2012',
                        '2013'     =>'2013',
                        '2014'     =>'2014',
                        '2015'     =>'2015',
                        '2016'     =>'2016',
                        '2017'     =>'2017',
                        '2018'     =>'2018',
                        '2019'     =>'2019',
                        '2020'     =>'2020',
                        '2021'     =>'2021',
                        '2022'     =>'2022',
                    ],
                    'value' => ''
                ],
            [
                'type' => 'select',
                'data' => 'string',
                'name' => 'mes',
                'label' => 'Meses',
                'rules' => 'required',
                'class' => 'w-auto px-2',
                'options' => [
                    'Enero'          =>'Enero',
                    'Febrero'        =>'Febrero',
                    'Marzo'          =>'Marzo',
                    'Abril'          =>'Abril',
                    'Mayo'           =>'Mayo',
                    'Junio'          =>'Junio',
                    'Julio'          =>'Julio',
                    'Agosto'         =>'Agosto',
                    'Septiembre'     =>'Septiembre',
                    'Octubre'        =>'Octubre',
                    'Noviembre'      =>'Noviembre',
                    'Diciembre'      =>'Diciembre',
                ],
                'value' => ''
            ],
        ]
    ],


    'app' => [

        'title' => 'Accesos directos del Escritorio seleccionados',
        'desc' => 'Todos los ajustes generales para la aplicación.',
        'icon' => 'fab fa-ussunnah',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'app_name',
                'label' => 'Nombre',
                'rules' => 'required|min:2|max:50',
                'value' => config('APP_NAME', 'Laravel')
            ],

        ]
    ],

    'membrete' => [

        'title' => 'Membrete para folletos',
        'desc' => 'Configuraciones de Email para la aplicación',
        'icon' => 'fas fa-heading',

        'elements' => [
            [
                'type' => 'text',
                'name' => 'por_usar',
                'label' => 'Por usar',
                'rules' => 'required'
            ],

        ]
    ],

    'training' => [

        'title' => 'Otros datos ',
        'desc' => 'Training settings',
        'icon' => "fas fa-graduation-cap",

        'elements' => [
            [
                'type' => 'select', // input fields type
                'data' => 'boolean', // data type, string, int, boolean
                'name' => 'remove_pending_training', // unique name for field
                'label' => 'Remove pending training upon training item revision?',
//                'rules' => 'required|boolean', // validation rule of laravel
                'class' => 'w-auto px-2', // class for input
                'options' => [
                   '1' => 'Si',
                   '0' => 'No'
                ]
            ],
            [
                'type' => 'number',
                'data' => 'int',
                'name' => 'pending_item_overdue_in_days',
                'label' => 'Days before pending training is overdue',
                'rules' => 'required|numeric|min:1',
                'class' => 'px-2 w-auto',
                'value' => 14
            ],
            [
                'type' => 'select',
                'data' => 'boolean',
                'name' => 'send_email_on_pending_training',
                'label' => 'Send email notification when training assign to a user?',
//                'rules' => 'boolean',
                'class' => 'w-auto px-2',
                'options' => [
                    '1' => 'Si',
                    '0' => 'No'
                ]
            ],
        ]
    ],

    'Locale' => [
        'title' => 'Formato de datos en relacion con su Localization',
        'desc' => 'Configure sus ajustes de localización como el formato de fecha y número, etc.',
        'icon' => 'fas fa-globe-americas',

        'elements' => [
            [
                'type' => 'select',
                'data' => 'string',
                'name' => 'date_format',
                'label' => 'Date format',
                'rules' => 'required',
                'class' => 'w-auto px-2',
                'options' => [
                    'm/d/Y' => date('m/d/Y'),
                    'm.d.y' => date("m.d.y"),
                    'j, n, Y' => date("j, n, Y"),
                    'M j, Y' => date("M j, Y"),
                    'd/m/Y' => date('d/m/Y'),
                    'D, M j, Y' => date('D, M j, Y')
                ],
                'value' => 'd/m/Y'
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'name' => 'time_format',
                'label' => 'Time format',
                'rules' => 'string',
                'class' => 'w-auto px-2',
                'options' => [
                    'g:i a' => date('g:i a') . ' (12-hour format)',
                    'g:i:s A' => date('g:i A') . ' (12-hour format)',
                    'G:i' => date("G:i"). ' (24-hour format)',
                    'h:i:s a' => date("h:i:s a") . ' (12-hour with leading zero)',
                    'h:i:s A' => date("h:i:s A")
                ],
                'value' => 'g:i a'
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'name' => 'timezone',
                'label' => 'Timezone',
                'class' => 'w-auto px-2',
                'rules' => 'string',
                'options' => array_combine(
                    DateTimeZone::listIdentifiers(DateTimeZone::ALL),
                    DateTimeZone::listIdentifiers(DateTimeZone::ALL)
                ),
                'value' => config('app.timezone', 'UTC')
            ]
        ]
    ],

    'email' => [
        'title' => 'Email oficial usado por la empresa',
        'desc' => 'Configuraciones de Email para la aplicación',
        'icon' => 'fas fa-envelope',
        'elements' => [
            [
                'type' => 'email',
                'name' => 'from_email',
                'label' => 'Casilla Email remitente',
                'rules' => 'required|email'
            ],
            [
                'type' => 'text',
                'name' => 'from_name',
                'label' => 'Nombre del remitente',
                'rules' => 'required|min:2|max:50'
            ],
            [
                'type' => 'text',
                'name' => 'email_subject',
                'label' => 'Tema del Email',
                'rules' => 'required|min:2|max:50'
            ]
        ]
    ],

];
