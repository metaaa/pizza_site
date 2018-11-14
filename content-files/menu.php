<?php

$menuItems = [
	[
		'menuText' => 'Main menu'
	],
	[
		'menuText' => 'Pizzas'
	],
	[
		'menuText' => 'Contact'
	],
];

foreach ($menuItems as $item) {
	echo $item['menuText'].' ';
}

?>