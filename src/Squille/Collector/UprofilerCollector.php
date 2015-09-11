<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Collector;

/**
 * Uprofiler collector
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class UprofilerCollector implements CollectorInterface
{
    /**
     * A run datas
     *
     * @var array
     */
    protected $datas = array();

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'uprofiler';
    }

    /**
     * {@inheritdoc}
     *
     * @return \Burdz\Squille\Collector\UprofilerCollector
     */
    public function start()
    {
        uprofiler_enable(UPROFILER_FLAGS_CPU + UPROFILER_FLAGS_MEMORY);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return \Burdz\Squille\Collector\UprofilerCollector
     */
    public function stop()
    {
        $this->datas = uprofiler_disable();
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function dump()
    {
        return $this->datas;
    }
}