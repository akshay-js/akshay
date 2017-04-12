<?php
use Cake\Routing\Router;

Router::plugin('akshay', function ($routes) {
	$routes->connect('/view', 
		['plugin' => 'akshay','controller' => 'AnalyticsReports', 'action' => 'viewRecords']
	);
	
	$routes->connect('/akshay', 
		['plugin' => 'akshay','controller' => 'AnalyticsReports', 'action' => 'index']
	);	
	$routes->fallbacks('DashedRoute');
});
