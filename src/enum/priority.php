<?php

declare (strict_types=1);
namespace App\enum;

enum priority: string
{
    case LOW = 'Low';
    case MEDIUM = 'Medium';
    case HIGH = 'High';

    public function badgeClass(): string
    {
        return match ($this) {
            SELF::HIGH=>'background-high',
            SELF::MEDIUM=>'background-medium',
            SELF::LOW=>'background-low'
        };
    }
}