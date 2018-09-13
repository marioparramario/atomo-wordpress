<?php

return [
	'defaultIncludes' => [
		__DIR__ . '/vendor/autoload.php',
		__DIR__ . '/wp-config.php'
	],

	'startupMessage' => sprintf('atomo | <info>%s</info>', shell_exec('uptime')),
];
