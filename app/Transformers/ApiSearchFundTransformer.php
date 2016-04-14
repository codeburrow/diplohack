<?php namespace App\Transformers;

/**
 * Class ApiFundTransformer.
 */
class ApiSearchFundTransformer extends Transformer
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
            "urls"        => explode(',', $item["urls"]),
        ];
    }
}