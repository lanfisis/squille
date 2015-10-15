<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Profiler\Plugin\Tideways;

use Evenement\EventEmitterInterface;
use Burdz\Squille\Profiler\Plugin\PluginInterface;

/**
 * Elasticsearch profiler plugin
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class ElasticsearchPlugin implements PluginInterface
{
    /**
     * Add Elasticsearch profiling to Tideway run
     *
     * @param EventEmitterInterface $emitter Event emitter
     */
    public function attachEvents(EventEmitterInterface $emitter)
    {
        $emitter->on('profiler.start.after', function () {
            $this->addQueryProfiler();
        });
    }

    /**
     * Add a callback on Elasticsearch queries to collect bofy of the quesy
     *
     * @return |Burdz\Squille\Profiler\Plugin\Tideways|ElasticsearchPlugin
     */
    protected function addQueryProfiler()
    {
        tideways_span_callback('Elasticsearch\\Client::search', function ($context) {
            $query = array();
            if (isset($context['args'][0]) && is_array($context['args'][0])) {
                $query['index'] = isset($context['args'][0]['index']) ? $context['args'][0]['index'] : 'no_index';
                $query['type'] = isset($context['args'][0]['type']) ? $context['args'][0]['type'] : 'no_type';
                $query['body'] = isset($context['args'][0]['body']) ? json_encode($context['args'][0]['body']) : '{}';
            }
            $span = tideways_span_create('elasticsearch');
            tideways_span_annotate($span, $query);
            return $span;
        });
        return $this;
    }
}