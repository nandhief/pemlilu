<?php

return [
	'create' => 'बनाइए (क्रिएट)',
	'save' => 'सुरक्षित करे ',
	'edit' => 'संपादित करे (एडिट)',
	'view' => 'देखें',
	'update' => 'सुधारे ',
	'list' => 'सूची',
	'no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'logout' => 'लोग आउट',
	'add_new' => 'नया समाविष्ट करे',
	'are_you_sure' => 'आप निस्चित है ?',
	'back_to_list' => 'सूची पे वापस जाए',
	'dashboard' => 'डॅशबोर्ड ',
	'delete' => 'मिटाइए',
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