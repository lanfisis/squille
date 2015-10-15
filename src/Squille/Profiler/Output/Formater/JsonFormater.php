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

use Burdz\Squille\Profiler\Report;

/**
 * Json formater
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class JsonFormater implements FormaterInterface
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function format(Report $report)
    {
        return json_encode($report->getAll(), JSON_PRETTY_PRINT);
    }
}