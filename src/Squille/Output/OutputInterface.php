<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Output;
use Burdz\Squille\Output\Formater\FormaterInterface;

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
     * @param array $report Profiling result
     *
     * @return self
     */
    public function setReport(array $report);

    /**
     * Set formater model
     *
     * @param FormaterInterface $formater Formater model
     *
     * @return self
     */
    public function setFormater(FormaterInterface $formater);
}