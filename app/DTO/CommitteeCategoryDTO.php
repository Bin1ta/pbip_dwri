<?php

namespace App\DTO;
class CommitteeCategoryDTO
{
    public function __construct(public int    $id,
                                public string $title,)
    {

    }

    public static function fromArray(array $data): CommitteeCategoryDTO
    {
        return new self(
            id: $data['id'],
            title: $data['title']
        );
    }
}
