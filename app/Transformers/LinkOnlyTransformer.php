<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/10/16
 */
namespace App\Transformers;

/**
 * Class LinkOnlyTransformer.
 */
class LinkOnlyTransformer extends Transformer
{

    /**
     * @param $item
     *
     * @return mixed
     */
    public function transform($item)
    {
        return [
            "url" => $item["url"],
        ];
    }
}