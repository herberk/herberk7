<?php

return [
    'title' => [
        'index' => 'Listado de usuarios',
        'trash' => 'Papelera de usuarios',
    ],

    'roles' => ['admin' => 'Admin', 'user' => 'Usuario'],
    'states' => ['active' => 'Activo', 'inactive' => 'Inactivo'],

    'filters' => [
        'roles' => ['all' => 'Rol', 'admin' => 'Administradores', 'user' => 'Usuarios'],
        'states' => ['all' => 'Todos', 'active' => 'Solo activos', 'inactive' => 'Solo inactivos'],
        'anos'=>['2005'=>'2005','2006'=>'2006','2007'=>'2007','2008'=>'2008','2009'=>'2009','2010'=>'2010',
            '2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016',
        '2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022']
    ],
];
