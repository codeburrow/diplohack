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
            "id"          => $item["id"],
            "description" => $item["description"],
            "url"         => $item["url"],
            "title"       => $item["title"],
        ];
    }
}