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

use Burdz\Squille\Profiler\Output\Formater\FormaterInterface;
use Burdz\Squille\Profiler\Report;

/**
 * Output interface
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
interface OutputInterface
{
    /**
     * Dump the handled result of profiling
     *
     * @return self
     */
    public function dump();

    /**
     * Handle the result of a profiling run
     *
     * @param Report $report Profiling result
     *
     * @return self
     */
    public function setReport(Report $report);

    /**
     * Set formater model
     *
     * @param FormaterInterface $formater Formater model
     *
     * @return self
     */
    public function setFormater(FormaterInterface $formater);
}