<?php

namespace App\Enums;

enum StatusType: string
{
      case STARTED = 'started';
      case IN_PROGRESS = 'in_progress';
      case DONE = 'done';
}
