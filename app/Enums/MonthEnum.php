<?php

namespace App\Enums;

enum MonthEnum: int
{
    case BAISAKH = 1;
    case JESTHA = 2;
    case ASHAD = 3;
    case SHRAWAN = 4;
    case BHADRA = 5;
    case ASHWIN = 6;
    case KARTIK = 7;
    case MANGSIR = 8;
    case POUSH = 9;
    case MAGH = 10;
    case FALGUN = 11;
    case CHAITRA = 12;

    public function label(): string
    {
        return match ($this) {
            self::BAISAKH => 'Baisakh',
            self::JESTHA => 'Jestha',
            self::ASHAD => 'Ashad',
            self::SHRAWAN => 'Shrawan',
            self::BHADRA => 'Bhadra',
            self::ASHWIN => 'Ashwin',
            self::KARTIK => 'Kartik',
            self::MANGSIR => 'Mangsir',
            self::POUSH => 'Poush',
            self::MAGH => 'Magh',
            self::FALGUN => 'Falgun',
            self::CHAITRA => 'Chaitra',
        };
    }

    public static function getValuesWithLabels(): array
    {
        $valuesWithLabels = [];

        foreach (self::cases() as $value) {
            $valuesWithLabels[] = [
                'value' => $value,
                'label' => $value->label(),
            ];
        }

        return $valuesWithLabels;
    }
}
