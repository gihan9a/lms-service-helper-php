<?php

declare(strict_types=1);

namespace LMSHelper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

trait ControllerHelper
{

    /**
     * Find model by id or fail
     *
     * @param string  $class
     * @param int $id
     * 
     * @return Model
     * 
     * @author Gihan S <gihanshp@gmail.com>
     */
    public function findModelOrFail(string $class, int $id): Model
    {
        $model = $class::find($id);
        if ($model === null) {
            $name = (new \ReflectionClass($class))->getShortName();
            $name = trim(strtolower(implode(' ', preg_split('/(?=[A-Z])/', $name))));
            throw new ModelNotFoundException('Unable to find ' . $name . ' ' . $id, 404);
        }
        return $model;
    }

    /**
     * Send response
     *
     * @param ResponseFactory $response
     * @param array           $data
     * @param array           $errors
     * @param int             $code
     * 
     * @return \Illuminate\Http\JsonResponse
     * 
     * @author Gihan S <gihanshp@gmail.com>
     */
    public function respond(
        ResponseFactory $response,
        array $data = null,
        array $errors = null,
        int $code = Response::HTTP_OK
    ): \Illuminate\Http\JsonResponse 
    {
        $json = [
            'code' => $code,
            'data' => $data,
            'errors' => $errors,
        ];
        return $response->json($json);
    }
}
