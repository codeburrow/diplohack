<?php namespace App\Transformers;

/**
 * Class ApiFundTransformer.
 */
class ApiFundTransformer extends Transformer
{
    /**
     * @param $item
     *
     * @return mixed
     */
    public function transform($item)
    {
        return [
            "title"       => $item["title"],
            "description" => $item["description"],
            "urls"        => $item["urls"],
        ];
    }
}