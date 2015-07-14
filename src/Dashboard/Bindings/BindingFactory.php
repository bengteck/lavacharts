<?php

namespace Khill\Lavacharts\Dashboard\Bindings;

use \Khill\Lavacharts\Utils;
use \Khill\Lavacharts\Dashboard\ChartWrapper;
use \Khill\Lavacharts\Dashboard\ControlWrapper;
use \Khill\Lavacharts\Exceptions\InvalidBindings;

/**
 * BindingFactory Class
 *
 * Creates new bindings for dashboards.
 *
 * @package    Lavacharts
 * @subpackage Dashboard\Bindings
 * @since      3.0.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class BindingFactory
{
    public function create($arg1, $arg2)
    {
        if ($arg1 instanceof ControlWrapper && $arg2 instanceof ChartWrapper)
        {
            return new OneToOne($arg1, $arg2);
        }
        else if ($arg1 instanceof ControlWrapper && Utils::arrayValuesCheck($arg2, 'class', 'ChartWrapper'))
        {
            return new OneToMany($arg1, $arg2);
        }
        else if (Utils::arrayValuesCheck($arg1, 'class', 'ControlWrapper') && $arg2 instanceof ChartWrapper)
        {
            return new ManyToOne($arg1, $arg2);
        }
        else if (Utils::arrayValuesCheck($arg1, 'class', 'ControlWrapper') && Utils::arrayValuesCheck($arg2, 'class', 'ChartWrapper'))
        {
            return new ManyToMany($arg1, $arg2);
        }
        else
        {
            throw new InvalidBindings;
        }
    }
}