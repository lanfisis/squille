<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Profiler\Plugin\Collector;

use Evenement\EventEmitterInterface;
use Burdz\Squille\Profiler\Plugin\PluginInterface;
use Burdz\Squille\Profiler\Report;
use Xhgui_Profile;

/**
 * Callgraph plugin
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class CallgraphPlugin implements PluginInterface
{
    /**
     * Add Elasticsearch profiling to Tideway run
     *
     * @param EventEmitterInterface $emitter Event emitter
     */
    public function attachEvents(EventEmitterInterface $emitter)
    {
        $emitter->on('profiler.dump.before', function (Report $report) {
            $this->getCallgraph($report);
        });
    }

    public function getCallgraph(Report $report)
    {
        $profiler = new Xhgui_Profile(array('profile' => $report->getCallstack()), true);
        $profiler->calculateSelf();
        $callgraph = $profiler->getCallgraph();
        $report->setCallgraph($callgraph);
        return $this;
    }
}