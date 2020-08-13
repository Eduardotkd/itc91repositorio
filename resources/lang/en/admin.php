<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Cantidad' => 'Cantidad',
            'Precio' => 'Precio',
            
        ],
    ],

    'registro' => [
        'title' => 'Registros',

        'actions' => [
            'index' => 'Registros',
            'create' => 'New Registro',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Edad' => 'Edad',
            'Fecha de Nacimiento' => 'Fecha de Nacimiento',
            
        ],
    ],

    'alumno' => [
        'title' => 'Alumnos',

        'actions' => [
            'index' => 'Alumnos',
            'create' => 'New Alumno',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Matricula' => 'Matricula',
            'Edad' => 'Edad',
            'FechaNacimiento' => 'FechaNacimiento',
            
        ],
    ],

    'vehiculo' => [
        'title' => 'Vehiculos',

        'actions' => [
            'index' => 'Vehiculos',
            'create' => 'New Vehiculo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];