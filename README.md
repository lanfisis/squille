A toolsuite for PHP interactive performance profiling.

Description
===========

The purpose of this tool is clearly not to profile your application at regular interval on production server (yeah, I mean like Blackfire.io or Tideways).   
The goal of this tool is to help you develop your PHP application the right way with the less effort to access run informations.
Modularity allows you to add your own collector or to choose the most convenient output in your development stack. But you can let the magic
appends and use the Chrome extension with just one line into your own code.

How it works
============

Basically you can use the profiler like this:
```php
use Burdz\Squille\Profiler;
use Burdz\Squille\Profiler\Output\FileOutput;
use Burdz\Squille\Profiler\Output\Formater\JsonFormater;
use Burdz\Squille\Profiler\Collector\UprofilerCollector;

$output = new FileOutput('.squille', __DIR__);
$output->setFormater(new JsonFormater());

$profiler = new Profiler($output);
$profiler->pushCollector(new UprofilerCollector());

$profiler->start();

// Do something who burn a lot of CPU resources here

$profiler->stop();
$profiler->dump();

// Look at .squille file in your current folder
```

Licence
=======
DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
Read term on LICENCE.md file