<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Profiler\Output;

use Burdz\Squille\Profiler\Report;

/**
 * Array output
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class ArrayOutput extends AbstractOutput implements OutputInterface
{
    /**
     * Profiling report
     *
     * @var Report
     */
    protected $report;

    /**
     * {@inheritdoc}
     */
    public function dump()
    {
        return $this->report->getAll();
    }

    /**
     * {@inheritdoc}
     */
    public function setReport(Report $report)
    {
        $this->report = $report;
        return $this;
    }
}