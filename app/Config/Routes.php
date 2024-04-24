<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth;
// use App\Controllers\User;
use App\Controllers\CallView\AuthView;
use App\Controllers\CallView\TaskView;
use App\Controllers\CallView\UserView;
use App\Controllers\CallView\RoleView;


/**
 * @var RouteCollection $routes
 */

// Define a route for a BaseController
 $routes->get('/', 'AuthView::login');
 
 $routes->post('/auth', 'AuthView::submit_login');
 $routes->post('auth/logout', 'AuthView::logout'); // Define route for POST requests
 // End Auth Route

 $routes->get('/task', 'TaskView::index');
 $routes->get('/create_task', 'TaskView::create');
 $routes->get('/view_task/(:num)', 'TaskView::view');
 $routes->get('/edit_task/(:num)', 'TaskView::update');
 $routes->get('/delete_task/(:num)', 'TaskView::delete');
 $routes->get('fetchTasksByPriority/(:segment)', 'TaskView::fetchTasksByPriority');
 $routes->get('fetchAllTasks', 'TaskView::fetchAllTasks');
 //  End Task Route


 $routes->post('/add_task', 'TaskView::add_task');
 $routes->post('/update_task', 'TaskView::update_task');
 //  End Task Submit Route
 

 $routes->get('/user', 'UserView::index');
 $routes->get('/create_user', 'UserView::create');
 $routes->get('/update_user/(:num)', 'UserView::update');
 $routes->get('/view_user/(:num)', 'UserView::view');
 $routes->get('/delete_user/(:num)', 'UserView::delete');
 // End User Route

 $routes->post('/add_user', 'UserView::add_user');
 $routes->post('/edit_user','UserView::edit_user');
 //  End User Submit Route

 $routes->get('/role', 'RoleView::index');
 $routes->get('/profile', 'UserView::profile');
