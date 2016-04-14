<?php namespace App\Transformers;

/**
 * Class ApiFundTransformer.
 */
class ApiGetFundTransformer extends Transformer
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
            "urls"        =>  $item["urls"],
//            "urls"        => explode(',', $item["urls"]),
        ];
    }
}