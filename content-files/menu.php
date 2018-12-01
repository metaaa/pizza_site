<?php

$menuItems = [
	[
		'menuText' => 'home',
		'order'    => '1',
        'menuTitle' => 'Welcome!'
	],
	[
		'menuText' => 'pizza',
		'order'    => '2',
        'menuTitle' => 'Our Pizzas'
	],
	[
		'menuText' => 'information',
		'order'    => '3',
        'menuTitle' => 'Information'
	],
	[
		'menuText' => 'contact',
		'order'    => '4',
        'menuTitle' => 'Contact Us'
	],
];
//count of menu items
$cell_width = (100 / count($menuItems));
//set different class to active menuitem
$page =  $_GET['page'];

foreach ($menuItems as $item) {
	//echo '<div style="align-self: center; width: ' . $cell_width . '%"><a href="index.php?page=' . $item['menuText'] . '">' . $item['menuText'] . "</a></div>";
    echo '<li ';

    if ($page == $item['menuText']){
        echo 'class="selectedMenuItem" ';
    }

    echo 'style="width: ' . $cell_width . '%"><a href="index.php?page=' . $item['menuText'] . '">' . $item['menuText'] . '</a>';
}
