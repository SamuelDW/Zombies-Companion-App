<?php

declare(strict_types=1);

namespace App\Entity\Trait;

use Carbon\Carbon;
use DateTime;

trait TimestampableEntity
{
    /**
     * @var Carbon
     * 
     * @ORM\Column(name="dtmAdded", type="datetime", nullable=false)
     */
    private DateTime $dateAdded;

    /**
     * @var Carbon
     * 
     * @ORM\Column(name="dtmUpdated", type="datetime", nullable=true)
     */
    private Carbon $dateUpdated;
}