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

/**
 * Collector interface
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
interface CollectorInterface
{
    /**
     * Returns collector identifier
     *
     * @return string
     */
    public function getIdentifier();

    /**
     * Method called when profiling start
     *
     * @return self
     */
    public function start();

    /**
     * Method called when profiling stop
     *
     * @return self
     */
    public function stop();

    /**
     * Dump profiling result
     *
     * @return array
     */
    public function dump();
}