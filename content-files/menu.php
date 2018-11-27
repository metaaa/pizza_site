<?php

$menuItems = [
	[
		'menuText' => 'home',
		'order'    => '1'
	],
	[
		'menuText' => 'pizza',
		'order'    => '2'
	],
	[
		'menuText' => 'information',
		'order'    => '3'
	],
	[
		'menuText' => 'contact',
		'order'    => '4'
	],
];
$cell_width = (100 / count($menuItems));
foreach ($menuItems as $item) {

	echo '<div style="align-self: center; width: ' . $cell_width . '%"><a href="index.php?page=' . $item['menuText'] . '">' . $item['menuText'] . "</a></div>";
}
