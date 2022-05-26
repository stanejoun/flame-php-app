# FlamePHP Application Skeleton

A skeleton for creating applications with FlamePHP 1.x.

The framework source code can be found here: [stanejoun/flame-php](https://github.com/stanejoun/flame-php).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist stanejoun/flame-php-app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist stanejoun/flame-php-app
```

In case you want to use a custom app dir name (e.g. `/myprojectname/`):

```bash
composer create-project --prefer-dist stanejoun/flame-php-app myprojectname
```

You can now either use your machine's webserver to view the default home page.

## Update

Since this skeleton is a starting point for your application and various files would have been modified as per your
needs, there isn't a way to provide automated upgrades, so you have to do any updates manually.

## Configuration

Read the `config/config.default.json` file and copy it to create a `config.json` file and a `config.test.json`.
The `config.json` file contains all the configuration needed to run the application. Modify it according to your
installation. The `config.test.json` file contains the configuration for the unit tests. These config files must not be
versioned or accessible from the web. Be sure to configure your server so that only the `public` folder is accessible
from the web. Finally, modify the `config/constants.php` file to modify the environment
variable : `'FlamePHP\Config::$ENVIRONMENT'`.

## Layout

The app skeleton uses [Bootstrap](https://getbootstrap.com/) (5.1.3) as example. You can, however, replace it with any
other library or framework like [Vue.js](https://vuejs.org/), [Angular](https://angular.io/)
or [React](https://en.reactjs.org/).

## Database

If you choose to use a database you can play the `migrations/install/install.sql` file to install the `user`
and `refresh_token` entities. You can run the script "create_admin_user.php" in the "tools" folder. Of course, over time
you will need to update the `migrations` folder to automate the production deployments.

