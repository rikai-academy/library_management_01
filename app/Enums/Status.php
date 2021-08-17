<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    const BookInCart = 0;
    const Approved =  1;
    const WaitingBook = 2;
    const BookReturn = 3;  
    const BookMiss = 4;
    const BookWaitingAccept = 5;  
}
