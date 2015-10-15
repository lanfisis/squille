<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Profiler\Collector;

use Burdz\Squille\Profiler\Collector\Plugin\PluginInterface;

/**
 * Abstract class for collector
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 * @see       https://github.com/tideways/profiler
 */
abstract class AbstractCollector
{
    /**
     * Collector plugins for post and pre profiling tasks
     *
     * @var array
     */
    protected $plugins = [];

    /**
     * Returns all colelctor plugins
     *
     * @return array
     */
    public function getPlugins()
    {
        return $this->plugins;
    }

    /**
     * Add a plugin to collector
     *
     * @param PluginInterface $plugin Plugin to add
     *
     * @return AbstractCollector
     */
    public function addPlugin(PluginInterface $plugin)
    {
        $this->plugins[] = $plugin;
        return $this;
    }
}