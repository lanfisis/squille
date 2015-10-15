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

use Burdz\Squille\Profiler\Report;

/**
 * Tideways collector
 * Inspired by native Tideways Profiler but fit Squille logic
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 * @see       https://github.com/tideways/profiler
 */
class TidewaysCollector extends AbstractCollector implements CollectorInterface
{
    /**
     * A run datas
     *
     * @var array
     */
    protected $datas = array();

    protected $defaultOptions = array(
        'ignored_functions' => array(
            'call_user_func',
            'call_user_func_array',
            'array_filter',
            'array_map',
            'array_reduce',
            'array_walk',
            'array_walk_recursive',
            'Symfony\Component\DependencyInjection\Container::get',
        ),
        'transaction_function' => 'Mage_Core_Controller_Varien_Action::dispatch',
        'exception_function' => null,
        'watches' => array(),
        'callbacks' => array(),
    );


    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'tideways';
    }

    /**
     * {@inheritdoc}
     *
     * @return \Burdz\Squille\Profiler\Collector\TidewaysCollector
     */
    public function start()
    {
        tideways_enable(
            TIDEWAYS_FLAGS_CPU  + TIDEWAYS_FLAGS_MEMORY,
            array_merge(
                $this->defaultOptions,
                array(
                    'collect' => 4,
                    'monitor' => 1,
                )
            )
        );
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return \Burdz\Squille\Profiler\Collector\TidewaysCollector
     */
    public function stop()
    {
        $this->datas['callstack'] = tideways_disable();
        $this->datas['timeline']  = tideways_get_spans();
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return Report
     */
    public function dump()
    {
        $report = new Report();
        $report->setCallstack($this->datas['callstack']);
        $report->setTimeline($this->datas['timeline']);
        return $report;
    }
}