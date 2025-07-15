<?php

declare (strict_types=1);
namespace App\enum;

enum status: string{
    case OPEN = 'Open';
    case CLOSED = 'Closed';

    public function badgeClass(): string
    {
        return match ($this) {
            SELF::OPEN=>'background-open',
            SELF::CLOSED=>'background-closed',
        };
    }
}