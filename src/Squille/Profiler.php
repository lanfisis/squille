<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille;

use Burdz\Squille\Profiler\Collector\CollectorInterface;
use Burdz\Squille\Profiler\Output\OutputInterface;
use Burdz\Squille\Profiler\Plugin\PluginInterface;
use Evenement\EventEmitter;

/**
 * Profiler
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class Profiler
{
    /**
     * Event emitter
     *
     * @var EventEmitter
     */
    protected $emitter;

    /**
     * A Data collector
     *
     * @var CollectorInterface
     */
    protected $collector;

    /**
     * Output model
     *
     * @var OutputInterface
     */
    protected $output;

    /**
     * Constructor
     *
     * @param CollectorInterface $collector Collector model
     * @param OutputInterface    $output    Output model
     */
    public function __construct(CollectorInterface $collector, OutputInterface $output)
    {
        $this->emitter   = new EventEmitter();
        $this->collector = $collector;
        $this->output    = $output;
    }

    /**
     * Add a plugin to profiler aware of profiler event
     *
     * @param PluginInterface $plugin Plugin
     *
     * @return \Burdz\Squille\Profiler
     */
    public function addPlugin(PluginInterface $plugin)
    {
        $plugin->attachEvents($this->emitter);
        return $this;
    }


    /**
     * Start profiling
     *
     * @return \Burdz\Squille\Profiler
     */
    public function start()
    {
        $this->emitter->emit('profiler.start.before');
        $this->collector->start();
        $this->emitter->emit('profiler.start.after');
        return $this;
    }

    /**
     * Stop profiling
     *
     * @return \Burdz\Squille\Profiler
     */
    public function stop()
    {
        $this->emitter->emit('profiler.stop.before');
        $this->collector->stop();
        $this->emitter->emit('profiler.stop.after');
        return $this;
    }

    /**
     * Dump profiling result
     *
     * @return \Burdz\Squille\Profiler
     */
    public function dump()
    {
        $this->output->setReport($this->collector->dump());
        return $this->output->dump();
    }
}