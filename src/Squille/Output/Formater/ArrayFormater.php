<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Output\Formater;

/**
 * Array formater
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class ArrayFormater implements FormaterInterface
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function format(array $report)
    {
        return $report;
    }
}