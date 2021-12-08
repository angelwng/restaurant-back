<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
 
    
    /**
     * @param  array|string $message
     * @param  integer      $statusCode
     * @param  array        $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respond($message, $statusCode = 200, $headers = [])
    {
      return response()->json($message, $statusCode, $headers);
    }
  
    /**
     * @param  array|string $message
     * @param  integer      $statusCode
     * @param  array        $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondOk($message, $statusCode = 200, $headers = [])
    {
      return $this->respond([
        'errors'      => false,
        'data'        => $message,
        'status_code' => $statusCode,
      ], $statusCode, $headers);
    }
  
    /**
     * @param  array|string $message
     * @param  integer      $statusCode
     * @param  array        $headers
     * @param  array        $dataExt
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithError($message, $statusCode = 400, $headers = [], $dataExt = null)
    {
      $response = [
        'errors'      => $message,
        'status_code' => $statusCode,
      ];
      if ($dataExt !== null) {
        $response['data'] = $dataExt;
      }
      return $this->respond($response, $statusCode, $headers);
    }
  
    protected function respondOkCORS($data, $statusCode = 200)
    {
      return $this->respond(
        array_merge([
          'errors'      => false,
          'status_code' => $statusCode,
        ], ['result' => $data]),
        $statusCode,
        $this->setCORSHeaders()
      );
    }
  
    protected function respondOkPager($data, $statusCode = 200)
    {
      return $this->respond(
        array_merge([
          'errors'      => false,
          'status_code' => $statusCode,
        ], ['result' => $this->getPagerStructure($data)]),
        $statusCode,
        $this->setCORSHeaders()
      );
    }
  
    private function getPagerStructure($data)
    {
      return [
        'data'  => $data['data'],
        'pager' => [
          'numberOfItems'=> intval($data['total']),
          'numberPerPage'=> intval($data['per_page']),
          'currentPage' => intval($data['current_page']),
          // 'numberInit' => intval($data['current_page'] * $data['per_page']),
          // 'numberEnd' => intval($data['per_page'])
        ]
      ];
    }
  
    private function setCORSHeaders()
    {
      $header['Access-Control-Allow-Origin']      = '*';
      $header['Allow']                            = 'GET, POST, OPTIONS, PUT, DELETE';
      $header['Access-Control-Allow-Headers']     = 'Origin, Content-Type, Accept, Authorization';
      $header['Access-Control-Allow-Credentials'] = 'true';
      return $header;
    }
    /**
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return void
     */
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
      $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);
  
      if ($validator->fails()) {
        $this->throwValidationException($request, $validator);
      }
    }
  
    /**
     * Throw the failed validation exception.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    protected function throwValidationException(Request $request, $validator)
    {
      throw new HttpResponseException($this->buildFailedValidationResponse(
        $request,
        $this->formatValidationErrors($validator)
      ));
    }
  
    /**
     * Create the response for when a request fails validation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $errors
     * @return \Illuminate\Http\Response
     */
    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
      $response = [
        'errors'      => $errors,
        'status_code' => IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY
      ];
      return new JsonResponse($response, IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
  
    /**
     * Format the validation errors to be returned.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return array
     */
    protected function formatValidationErrors(Validator $validator)
    {
      return $validator->errors()->getMessages();
    }
  
    /**
     * Get the URL we should redirect to.
     *
     * @return string
     */
    protected function getRedirectUrl()
    {
      return app('session')->previousUrl();
    }
  
    /**
     * Get a validation factory instance.
     *
     * @return \Illuminate\Contracts\Validation\Factory
     */
    protected function getValidationFactory()
    {
      return app('validator');
    }
  
    /**
     * Get the key to be used for the view error bag.
     *
     * @return string
     */
    protected function errorBag()
    {
      return 'default';
    }
  }