<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Profiler;

/**
 * Report
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class Report
{
    /**
     * Report metas
     *
     * @var array
     */
    protected $metas = [];

    /**
     * Report callstack
     *
     * @var array
     */
    protected $callstack = [];

    /**
     * Report callgraph
     *
     * @var array
     */
    protected $callgraph = [];

    /**
     * Report timeline
     *
     * @var array
     */
    protected $timeline = [];

    /**
     * Returns metas
     *
     * @return array
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * Set metas
     *
     * @param array $metas
     *
     * @return Report
     */
    public function setMetas($metas)
    {
        $this->metas = $metas;
        return $this;
    }

    /**
     * Returns callstack
     *
     * @return array
     */
    public function getCallstack()
    {
        return $this->callstack;
    }

    /**
     * Set callstack
     *
     * @param array $callstack
     *
     * @return Report
     */
    public function setCallstack($callstack)
    {
        $this->callstack = $callstack;
        return $this;
    }

    /**
     * Returns callgraph
     *
     * @return array
     */
    public function getCallgraph()
    {
        return $this->callgraph;
    }

    /**
     * Set callgraph
     *
     * @param array $callgraph
     *
     * @return Report
     */
    public function setCallgraph($callgraph)
    {
        $this->callgraph = $callgraph;
        return $this;
    }

    /**
     * Returns timeline
     *
     * @return array
     */
    public function getTimeline()
    {
        return $this->timeline;
    }

    /**
     * Set timeline
     *
     * @param array $timeline
     *
     * @return Report
     */
    public function setTimeline($timeline)
    {
        $this->timeline = $timeline;
        return $this;
    }

    /**
     * Returns entire report informations
     *
     * @return array
     */
    public function getAll()
    {
        return array(
            'metas'     => $this->getMetas(),
            'callstack' => $this->getCallstack(),
            'callgraph' => $this->getCallgraph(),
            'timeline'  => $this->getTimeline(),
        );
    }
}