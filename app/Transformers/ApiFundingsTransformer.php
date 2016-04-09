<?php namespace CodeBurrow\Transformers;

/**
 * Abstract Class. Transforms collection array.
 *
 */
class ApiCoordinatesTransformer extends Transformer
{

	/**
	 * @param $item
	 *
	 * @return mixed
	 */
	public function transform($item)
	{
		return [
			"ID"      => $item["ID"],
			"routeID" => $item["routeID"],
			"theDate" => $item["theDate"],
			"theTime" => $item["theTime"],
			"lat"     => $item["lat"],
			"lng"     => $item["lng"],
		];
	}
}