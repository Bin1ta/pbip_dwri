<?php

namespace App\Enums;

enum ProjectTypeEnum: string
{
    case BADKAPATH = 'badkapath';
    case PRAGANNA = 'praganna';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::BADKAPATH => 'बड्कापथ',
            self::PRAGANNA => 'प्रगन्ना',
        };
    }
    public function labelEn(): string
    {
        return self::getLabelEn($this);
    }

    public static function getLabelEn(self $value): string
    {
        return match ($value) {
            self::BADKAPATH => 'Badkapath',
            self::PRAGANNA => 'Praganna',
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
