<?php

namespace App\Helpers;

use App\Models\Menu;

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

    function repeatCharacter($times, $character = "-")
    {
        $result = '';

        for ($i = 0; $i < $times; $i++) {
            $result .= $character;
        }

        return $result;
    }
}
