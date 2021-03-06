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

/**
 * Abstract output
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
abstract class AbstractOutput
{
    /**
     * Formater model
     *
     * @var FormaterInterface
     */
    protected $formater;

    /**
     * {@inheritdoc}
     */
    public function setFormater(FormaterInterface $formater)
    {
        $this->formater = $formater;
        return $this;
    }
}