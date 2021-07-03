Simple plugin to implement Bootstrap in CakePHP 3
===================================================

This plugin is a fork of the Twitter Bootstrap Plugin
https://github.com/elboletaire/twbs-cake-plugin

This plugin only use CSS, dont use Less.

It also contains bake templates that will help you starting *twitter-bootstraped*
CakePHP webapps.

General Features
----------------

- Bake templates.
- Generic Bootstrap layout.

Installation
------------

### Adding the plugin

You can easily install this plugin using composer as follows:

```bash
composer require ribafs/twbs-cake-css
```

### Enabling the plugin

After adding the plugin remember to load it in your `config/bootstrap.php` file:

```php
bin/cake plugin load Bootstrap
```

This will load the CSS for you.

### Add Template to src/Controller/AppController.php
```php
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->theme('Bootstrap');
    ...
```     

### Baking views

You can bake your views using the twitter bootstrap templates bundled with this
plugin. To do so, simply specify the `bootstrap` template when baking your files:

```bash
bin/cake bake all amigos --theme Bootstrap
```

License
-------

The MIT License (MIT)

    Copyright 2013-2015 Òscar Casajuana (a.k.a. elboletaire)

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.

