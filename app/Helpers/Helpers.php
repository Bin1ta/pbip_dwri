<?php

namespace App\Helpers;

use App\Models\Menu;
use Illuminate\Support\Str;

class Helpers
{
    public static function getFrontUrl(Menu $menu, ?string $language = 'ne'): string
    {
        $menu->load('model');
        if ($menu->menus_count > 0) {
            return "#";
        } else {
            if (config('default.subDivision')) {
                if (!empty($menu->model)) {

                    return match ($menu->type) {
                        'category' => route('documentCategory', [$menu->model->slug, 'language' => $language]),
                        'committeeCategory' => route('committeeCategory', [$menu->model->id, 'language' => $language]),
                        'finishedContract' => route('finishedContract', [$menu->model->id, 'language' => $language]),
                        'currentContract' => route('currentContract', [$menu->model->id, 'language' => $language]),
                        default => route('officeDetail', [$menu->model->slug, 'language' => $language]),
                    };
                } else {
                    return route('static', [$menu->slug, 'language' => $language]);
                }
            } else {
                if (!empty($menu->model)) {
                    return match ($menu->type) {
                        'category' => route('documentCategory', [$menu->model->slug, 'language' => $language]),
                        default => route('officeDetail', [$menu->model->slug, 'language' => $language]),
                    };
                } else {
                    return route('static', [$menu->slug, 'language' => $language]);
                }
            }
        }
    }

    public static function getNepaliNumber(string|int $data): string
    {
        $data = self::getStringData($data);
        return Str::replace(['0','1','2','3','4','5','6','7','8','9'],['०','१','२','३','४','५','६','७','८','९'], $data);
    }

    public static function getEnglishNumber(string|int $data): string
    {
        $data = self::getStringData($data);
        return Str::replace(['०','१','२','३','४','५','६','७','८','९'],['0','1','2','3','4','5','6','7','8','9'], $data);
    }

    /**
     * @param int|string $data
     * @return string
     */
    public static function getStringData(int|string $data): string
    {
        if (!is_string($data)) {
            $data = (string)$data;
        }
        return $data;
    }


}
