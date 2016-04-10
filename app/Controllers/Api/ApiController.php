<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since  10/03/16
 */

namespace App\Controllers\Api;

/**
 * Class ApiController
 *
 * @package App\Controllers\Api
 */
class ApiController
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnprocessableEntity($message = 'Parameters validation failed.')
    {
        return $this->setStatusCode(422)->respondWithError($message);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    private function respond(array $data)
    {
        exit(json_encode($data));
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @api           {any} /api/non-existent-url 404
     *
     * @apiPermission none
     * @apiVersion    1.0.0
     * @apiName       RequestResource
     * @apiGroup      Exceptions
     * @apiExample {curl} Example usage:
     *      curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET "http://api-clothesai.herokuapp.com/api/non-existent" | json
     *
     * @apiSuccessExample {json} NotFound-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *          "error": {
     *              "message": "Not Found. See http://api-clothesai.herokuapp.com/doc",
     *              "status_code": 404
     *          }
     *     }
     */
    
    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found.')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param $data
     *
     * @return mixed
     *
     */
    public function respondWithSuccess($data)
    {
        return $this->respond([
            'status_code' => $this->getStatusCode(),
            'data'        => $data,
        ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondInternalServerError($message = 'Internal Server Error.')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

}
