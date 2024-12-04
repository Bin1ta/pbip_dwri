<?php

namespace App\Enums;

enum DocumentTypeEnum: string
{
    case TECHNICIAN = 'technician';
    case STORE = 'store';
    case ACCOUNT = 'account';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::TECHNICIAN => 'प्रविधिक',
            self::STORE => 'स्टोर',
            self::ACCOUNT => 'लेखा',
        };
    }
    public function labelEn(): string
    {
        return self::getLabelEn($this);
    }

    public static function getLabelEn(self $value): string
    {
        return match ($value) {
            self::TECHNICIAN => 'technician',
            self::STORE => 'store',
            self::ACCOUNT => 'account',
        };
    }

    public static function getValuesWithLabels(): array
    {
        $valuesWithLabels = [];

        foreach (self::cases() as $value) {
            $valuesWithLabels[] = [
                'value' => $value,
                'label' => $value->label(),
                'labelEn' => $value->labelEn(),
            ];
        }

        return $valuesWithLabels;
    }
}
