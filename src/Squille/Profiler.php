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
     * A collection of available collector
     *
     * @var CollectorInterface[]
     */
    protected $collectors = [];

    /**
     * Output model
     *
     * @var OutputInterface
     */
    protected $output;

    /**
     * Constructor
     *
     * @param OutputInterface   $output   Output model
     */
    public function __construct(OutputInterface $output)
    {
        $this->output   = $output;
    }

    /**
     * Push collector into collector stock
     *
     * @param CollectorInterface $collector
     *
     * @return \Burdz\Squille\Profiler
     */
    public function pushCollector(CollectorInterface $collector)
    {
        $this->collectors[$collector->getIdentifier()] = $collector;
        return $this;
    }

    /**
     * Start profiling
     *
     * @return \Burdz\Squille\Profiler
     */
    public function start()
    {
        foreach ($this->collectors as $collector) {
            $collector->start();
        }
        return $this;
    }

    /**
     * Stop profiling
     *
     * @return \Burdz\Squille\Profiler
     */
    public function stop()
    {
        foreach ($this->collectors as $collector) {
            $collector->stop();
        }
        return $this;
    }

    /**
     * Dump profiling results
     *
     * @return \Burdz\Squille\Profiler
     */
    public function dump()
    {
        $report = [];
        foreach ($this->collectors as $collector) {

            $report[$collector->getIdentifier()] = $collector->dump();
        }
        $this->output->setReport($report);
        return $this->output->dump();
    }
}