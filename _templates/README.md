# {PROJECT_NAME}

{PROJECT_DESCRIPTION}

### Prerequisites

[Docker (mac)](https://docs.docker.com/docker-for-mac/) - needed for application containers used during development

```
$ docker --version
Docker version 18.09, build c97c6d6

$ docker-compose --version
docker-compose version 1.24.0, build 8dd22a9

$ docker-machine --version
docker-machine version 0.16.0, build 9ba6da9
```

## Getting Started
To start developing on your machine, run `cp .env.example .env` and adjust variables as needed. If you need to change the default port the site is served from, add the following while changing the values:
```
// .env
APP_PORT=8000
FORWARD_DB_PORT=3306
```

It might be a good idea to alias the `sail` command:
```
alias sail='bash vendor/bin/sail'

// otherwise you can run Laravel Sail by
./vendor/bin/sail up
```

### Starting & Stopping Sail
Laravel Sail's `docker-compose.yml` file defines a Docker variety of containers that work together to help you build Laravel applications. Each of these containers is an entry within the `services` configuration of your docker-compose.yml file. The `laravel.test` container is the primary application container that will be serving your application.
```
# Start/Stop docker containers
sail up
Ctrl + C
# Start/Stop docker containers in daemon (background) mode
sail up -d 
sail down
```

### Container CLI
Use the Container CLI to remote in and execute commands
```
sail shell
sail tinker
```


### Executing Commands
```
# Running Artisan commands within Laravel Sail
sail artisan make:controller MyAppController
sail artisan queue:work

# Executing php commands
sail php script.php

# Executing composer comamnds
sail composer require laravel/sanctum

# Executing Node / NPM Commands
sail node --version
sail npm run prod
```

### PHP Versions

To change the PHP version that is used to serve your application, you should update the `build` definition of the laravel.test container in your application's `docker-compose.yml` file:
```
# PHP 8.0
context: ./vendor/laravel/sail/runtimes/8.0

# PHP 7.4
context: ./vendor/laravel/sail/runtimes/7.4
```

In addition, you may wish to update your `image` name to reflect the version of PHP being used by your application. This option is also defined in your application's `docker-compose.yml` file:

```
image: sail-8.0/app
image: sail-7.4/app
```

After updating your application's `docker-compose.yml` file, you should rebuild your container images:

```
sail build --no-cache
sail up
```

### Running Test
```
sail test
sail test --group orders
```

### Previewing Emails
Laravel Sail's default `docker-compose.yml` file contains a service entry for *MailHog*. MailHog intercepts emails sent by your application during local development and provides a convenient web interface so that you can preview your email messages in your browser. When using Sail, MailHog's default host is `mailhog` and is available via port 1025:
```
MAIL_HOST=mailhog
MAIL_PORT=1025
```
When Sail is running, you may access the MailHog web interface at: [http://localhost:8025](http://localhost:8025)

### Sharing Your Site
Sometimes you may need to share your site publicly in order to preview your site for a colleague or to test webhook integrations with your application. To share your site, you may use the share command. After executing this command, you will be issued a random laravel-sail.site URL that you may use to access your application:
```
sail share
```
If you would like to choose the subdomain for your shared site, you may provide the subdomain option when executing the share command:
```
sail share --subdomain=my-sail-site
```

## Built With

* [Laravel](https://laravel.com/docs/) - PHP Framework
* [Composer](https://getcomposer.org/doc/) - Dependency Management
* [Node](https://nodejs.org/en/) - Node w/ Package Manager
* [Docker](https://docs.docker.com/) - Image container 

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/{GITHUB_USERNAME}/{PROJECT_NAME}/tags). 

## Authors

* **{AUTHOR_NAME}** - [{AUTHOR_WEBSITE}]({AUTHOR_WEBSITE})

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
