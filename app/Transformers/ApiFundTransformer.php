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
            "description" => $item["description"],
            "urls"        => $item["urls"],
            "title"       => $item["title"],
        ];
    }
}