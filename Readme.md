#Yaml Router Provider

Provedor de serviços  para rotas em yml no Silex.

## Installation

Add the package *"rafamaciel/yaml-router"* to the composer.json file and update composer.

```json
{
    "require":{
        ...
        "rafamaciel/yaml-router":"dev-master"
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
        'router.path' => __DIR__.'/routes.yml',
    ));
    
    
```

## Example

Below is an example of the routes file.

```yaml
# routes.yml
home:
  path: /
  defaults: { _controller: 'Rafamaciel\BlogController::indexAction' }
 
hello:
  path: /post/{post_id}
  defaults: { _controller: 'Rafamaciel\BlogController::postAction' }
```

You may also point to other routes yml files
```yaml
blog:
  prefix: /blog
  resource: blog.yml
```
