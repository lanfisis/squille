<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Profiler\Output\Formater;

/**
 * Formater interface
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
interface FormaterInterface
{
    /**
     * Format final report
     *
     * @param array $report Final report
     *
     * @return mixed
     */
    public function format(array $report);
}