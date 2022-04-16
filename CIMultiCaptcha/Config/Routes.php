<?php

/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha(CIMC) Routes
* --------------------------------------------------------------------------
*
* @package         CodeIgniter-Multi-Captcha(CIMC)
* @collection      Best Datamweb Tools CI4(BDT-CI4)
* @author          Pooya Parsa Dadashi(@datamweb)
* @link            https://datamweb.ir
* @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
* @since           Version 1.0.2-pre-alpha
* @datepublic      2022-02-26 | 1400/12/07
* 
*/

$routes->group('', ['namespace' => 'Datamweb\CIMC\Controllers'], function ($routes) {

    //for rate limit page.
    $routes->get('ratelimit', 'RateLimit::index');
    $routes->post('ratelimit', 'RateLimit::index');

    $routes->get('RateLimit', 'RateLimit::index');
    $routes->post('RateLimit', 'RateLimit::index');

    
});
