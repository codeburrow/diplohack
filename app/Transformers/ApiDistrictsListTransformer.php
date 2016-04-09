<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Transformers;

/**
 * Class ApiDistrictsListTransformer.
 */
class ApiDistrictsListTransformer extends Transformer
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
            "name"        => $item["name"],
            "description" => $item["description"],
        ];
    }
}