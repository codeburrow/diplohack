<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Transformers;

/**
 * Class ApiDistrictsListTransformer.
 */
class ApiProfilesListTransformer extends Transformer
{
    /**
     * @param $item
     *
     * @return mixed
     */
    public function transform($item)
    {
        return [
            "id"   => $item["id"],
            "text" => $item["name"],
        ];
    }
}