<?php namespace App\Transformers;

/**
 * Abstract Class. Transforms collection array.
 *
 */
class ApiFundingsTransformer extends Transformer
{
    /**
     * @param $item
     *
     * @return mixed
     */
    public function transform($item)
    {
        return [
            "description" => $item["description"],
            "title"       => $item["title"],
        ];
    }
}