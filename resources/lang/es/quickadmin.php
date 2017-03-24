<?php

return [
	'create' => 'Crear',
	'save' => 'Guardar',
	'edit' => 'Editar',
	'view' => 'Ver',
	'update' => 'Actualizar',
	'list' => 'Listar',
	'no_entries_in_table' => 'Sin valores en la tabla',
	'custom_controller_index' => 'Índice del controlador personalizado (index).',
	'logout' => 'Salir',
	'add_new' => 'Agregar',
	'are_you_sure' => 'Estás seguro?',
	'back_to_list' => 'Regresar a la lista?',
	'dashboard' => 'Tablero',
	'delete' => 'Eliminar',
	'quickadmin_title' => 'GALAXI',
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'contact-management' => [		'title' => 'Contact Management',		'created_at' => 'Time',		'fields' => [		],	],
		'companies' => [		'title' => 'Companies',		'created_at' => 'Time',		'fields' => [			'name' => 'Company name',			'address' => 'Address',			'website' => 'Website',			'email' => 'Email',		],	],
		'contacts' => [		'title' => 'Contacts',		'created_at' => 'Time',		'fields' => [			'company' => 'Company',			'first-name' => 'First name',			'last-name' => 'Last name',			'phone1' => 'Phone 1',			'phone2' => 'Phone 2',			'email' => 'Email',			'skype' => 'Skype',			'address' => 'Address',		],	],
		'work-types' => [		'title' => 'Work types',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'projects' => [		'title' => 'Projects',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'time-entries' => [		'title' => 'Time entries',		'created_at' => 'Time',		'fields' => [			'work-type' => 'Work type',			'project' => 'Project',			'start-time' => 'Start time',			'end-time' => 'End time',		],	],
		'reports' => [		'title' => 'Reports',		'created_at' => 'Time',		'fields' => [		],	],
		'settings' => [		'title' => 'Settings',		'created_at' => 'Time',		'fields' => [		],	],
		'expense-category' => [		'title' => 'Expense Categories',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'income-category' => [		'title' => 'Income categories',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'income' => [		'title' => 'Income',		'created_at' => 'Time',		'fields' => [			'income-category' => 'Income Category',			'entry-date' => 'Entry date',			'amount' => 'Amount',		],	],
		'expense' => [		'title' => 'Expenses',		'created_at' => 'Time',		'fields' => [			'expense-category' => 'Expense Category',			'entry-date' => 'Entry date',			'amount' => 'Amount',		],	],
		'monthly-report' => [		'title' => 'Monthly report',		'created_at' => 'Time',		'fields' => [		],	],
];