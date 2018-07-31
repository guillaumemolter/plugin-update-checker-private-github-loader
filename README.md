# Plugin Update Checker Git loader
Helper to configure https://github.com/YahnisElsts/plugin-update-checker for Github private repo.

## How to use:

## How to use:
1. Then add this library to your plugin or theme `composer require guillaumemolter/plugin-update-checker-private-github-loader`
2. Finally inside of your plugin or theme:

```
<?php

$plugin_update_checker = new PrivateGithubSetup( 'superusername', 'repo-slug', 'XXXXXXXX' );
// or
$plugin_update_checker = new PrivateGithubSetup( 'superorgname', 'repo-slug', 'XXXXXXXX' );
// or
$plugin_update_checker = new PrivateGithubSetup( 'superorgname', 'repo-slug', 'XXXXXXXX', 'dev-branch' );
$plugin_update_checker->init();

?>


