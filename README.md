A toolsuite for PHP interactive performance profiling.

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