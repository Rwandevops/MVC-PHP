<?php
// ********** HOME ********** //
$router->use('GET', 'Webroot', new App\Controllers\HomeController(), 'home_view');
$router->use('POST', 'Webroot', new App\Controllers\HomeController(), 'home');
// ********** ARTICLES ************* //
$router->use('GET', '/article/view', new App\Controllers\ArticleController(), 'article_view');
$router->use('POST', '/article/view', new App\Controllers\ArticleController(), 'article');

// ********** REGISTER ************* //
$router->use('GET', '/auth/register', new App\Controllers\RegisterController(), 'register_view');
$router->use('POST', '/auth/register', new App\Controllers\RegisterController(), 'register');

// ********** LOGIN *************** //
$router->use('GET', '/auth/login', new App\Controllers\LoginController(), 'login_view');
$router->use('POST', '/auth/login', new App\Controllers\LoginController(), 'login');

// ********** ADMIN USER ********** //
$router->use('GET', '/auth/admin', new App\Controllers\AdminUserController(), 'adminuser_view');
$router->use('POST', '/auth/admin', new App\Controllers\AdminUserController(), 'adminuser');

// ********** ADMIN ARTICLES ********** //
$router->use('GET', 'article/admin', new App\Controllers\AdminArticleController(), 'adminarticle_view');
$router->use('POST', '/article/admin', new App\Controllers\AdminArticleController(), 'adminarticle');
