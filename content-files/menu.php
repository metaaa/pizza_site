<?php

$menuItems = [
	[
		'menuText' => 'Home',
		'order'    => '1'
	],
	[
		'menuText' => 'Pizza',
		'order'    => '2'
	],
	[
		'menuText' => 'Information',
		'order'    => '3'
	],
	[
		'menuText' => 'Contact',
		'order'    => '4'
	],
];
$cell_width = (100 / count($menuItems));
foreach ($menuItems as $item) {

	echo '<div style="align-self: center; width: ' . $cell_width . '%">' . $item['menuText'] . "</div>";
}
//<a href="index.php?page=' . $item['menuText'] . '"></a>
