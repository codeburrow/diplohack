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
			"url" => $item["url"],
			"funding_description" => $item["funding_description"],
			"title" => $item["title"],
			"link_description" => $item["link_description"],
		];
	}
}