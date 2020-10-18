Symfony Service Application
============

The "Symfony Service Application" is a simple application to show how to
create a service following the [Symfony Best Practices][1].

Requirements
------------

Require the [usual Symfony application requirements][2].

  * PHP 7.2.9 or higher
  * Some PHP extensions
  * Composer
  * Symfony CLI
  
Installation
------------

Clone the [repository][3] on your computer:

```bash
$ git clone https://github.com/mickaelbober/symfony-service.git symfony-service
```

Configuring your `.env` file:

```bash
MAILER_DSN=smtp://user:pass@smtp.example.com
```

Configuring your `services.yaml` file:

```bash
parameters:
    mailFrom: 'send@example.com'
    mailSubject: 'Symfony Service Application'
    mailTo: 'recipient@example.com'
    mailMessage: 'Spam detected'
    maxError: 1
```

Composer
------------

[Download Composer][4] to install the `composer` binary on your computer and install
dependencies to the `./vendor` directory.

```bash
$ cd symfony-service/
$ composer install
```

Symfony CLI
------------

[Download Symfony][5] to install the `symfony` binary on your computer. 

```bash
$ wget https://get.symfony.com/cli/installer -O - | bash
```

Run this command and access the application in your
browser at the given URL (<https://localhost:8000> by default):

```bash
$ cd symfony-service/
$ symfony server:start
```

If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][6] like Nginx or
Apache to run the application.

References
------------

 * [The DependencyInjection Component][7]
 * [Service Container][8] 
 * [Symfony Demo service.yaml][9]
 * [The YAML Format][10] 
 * [Openclassrooms : Tutorial][11]

[1]: https://symfony.com/doc/current/best_practices.html
[2]: https://symfony.com/doc/current/setup.html
[3]: https://github.com/mickaelbober/symfony-service
[4]: https://getcomposer.org/download/
[5]: https://symfony.com/download
[6]: https://symfony.com/doc/current/setup/web_server_configuration.html
[7]: https://symfony.com/doc/current/components/dependency_injection.html
[8]: https://symfony.com/doc/current/service_container.html
[9]: https://github.com/symfony/demo/blob/v1.2.5/config/services.yaml
[10]: https://symfony.com/doc/current/components/yaml/yaml_format.html
[11]: https://openclassrooms.com/fr/courses/5489656-construisez-un-site-web-a-l-aide-du-framework-symfony-4/5516991-realisez-une-application-configurable-et-extensible
