<?php
/**
 * DeleteObjectStateSignal class
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Repository\SignalSlot\Signal\ObjectStateService;

use eZ\Publish\Core\Repository\SignalSlot\Signal;

/**
 * DeleteObjectStateSignal class
 * @package eZ\Publish\Core\Repository\SignalSlot\Signal\ObjectStateService
 */
class DeleteObjectStateSignal extends Signal
{
    /**
     * ObjectStateId
     *
     * @var mixed
     */
    public $objectStateId;
}