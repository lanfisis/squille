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

use Gaufrette\Filesystem;
use Gaufrette\Adapter\Local as LocalAdapter;
use Gaufrette\File;

/**
 * File output
 *
 * @package   Squille
 * @author    David Buros <david.buros@gmail.com>
 * @copyright 2015 David Buros
 * @licence   WTFPL see LICENCE.md file
 */
class FileOutput extends AbstractOutput implements OutputInterface
{
    /**
     * Profiling record
     *
     * @var array
     */
    protected $report;

    /**
     * Report file name
     *
     * @var string
     */
    protected $filename;

    /**
     * Log file path
     *
     * @var \Gaufrette\Filesystem
     */
    protected $filesystem;

    /**
     * Constructor
     *
     * @param string $filename File name
     * @param string $path     Dump path
     */
    public function __construct($filename, $path)
    {
        $this->filename = ltrim($filename, '/');
        $adapter = new LocalAdapter(rtrim($path, '/'));
        $this->filesystem = new Filesystem($adapter);
    }

    /**
     * {@inheritdoc}
     */
    public function dump()
    {
        $report = $this->formater->format($this->report);
        $file = new File($this->filename, $this->filesystem);
        if ($file->exists()) {
            $file->delete();
        }
        $file->setContent($report);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setReport(array $report)
    {
        $this->report = $report;
        return $this;
    }
}