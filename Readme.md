#Yaml Router Provider

Service provider for loading routes from YAML files. 

This is a Silex 2 compatible fork of https://github.com/rafamaciel/YamlRouter

## Installation

Add the package *"bilgorajskim/yaml-router"* to the composer.json file and update composer.

```json
{
    "require":{
        ...
        "bilgorajskim/yaml-router":"dev-master"
    }
}
```

## Usage

### Parameters:
***router.path:*** Your yml file path.
### Registering

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->register(new YamlRouter\Provider(), array(
    'router.path' => __DIR__.'/routing.yml',
));
```

## Example

Below is an example of the routes file.

```yaml
# routing.yml
home:
  path: /
  defaults: { _controller: 'Foo\HomeController::indexAction' }
 
hello:
  path: /post/{post_id}
  defaults: { _controller: 'Foo\HelloController::postAction' }
  
# Using services as controllers is also possible
article:
  path: /article/{article_id}
  defaults: { _controller: 'article.controller:showAction' }
```

You may also point to other route files
```yaml
blog:
  prefix: /blog
  resource: blog.yml
```
## Credits
This service provider has been built based on an [article](http://gonzalo123.com/2013/03/04/scaling-silex-applications-part-ii-using-routecollection/) written by [Gonzalo Ayuso](https://github.com/gonzalo123).
