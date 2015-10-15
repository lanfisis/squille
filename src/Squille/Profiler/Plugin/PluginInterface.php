<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Profiler\Plugin;

use Evenement\EventEmitterInterface;

/**
 * Plugin interface
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
interface PluginInterface
{
    /**
     * Attach an event to emitter
     *
     * @param EventEmitterInterface $emitter Event emitter
     *
     * @return mixed
     */
    public function attachEvents(EventEmitterInterface $emitter);
}