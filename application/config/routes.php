<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// post routes
$route['posts/index'] = 'posts/index';
$route['posts/edit'] = 'posts/edit/$1';
// $route['posts/edit'] = 'posts/edit/$1';
$route['posts/submit'] = 'posts/submit';
$route['posts/(:any)'] = 'posts/viewOne/$1';
$route['posts'] = 'posts/index';

// categories routes
$route['categories/new'] = 'categories/submit';
$route['category/posts/(:any)'] = 'categories/by_category/$1';
// comments routes
// $route['comment/new/(:any)'] = 'comments/submit/$1';
// u dont need to specify a route for ctrlrs that has  

// auth routes
$route['auth/login'] = 'users/login';
$route['auth/logout'] = 'users/logout';
$route['auth/register'] = 'users/register';

// default routes
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
