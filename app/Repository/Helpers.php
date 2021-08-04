<?php
/*
|--------------------------------------------------------------------------
| Application Helpers
|--------------------------------------------------------------------------
|
| Here is where you we define static helper methods used in the Application.
|
*/

namespace App\Repository;

class Helpers
{
    /**
     * Format and return error response
     *
     * @param string $message
     * @param array|null $errors
     * @param int $code
     * @return JsonResponse
     */
    protected function errorResponse($message = 'action failed', $errors = [], $code = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], $code);
    }

    /**
     * Format and return success response
     *
     * @param  string  $message
     * @param  array|string  $data
     * @param  int  $code
     * @return JsonResponse
     */
    public static function sendSuccessResponse($data = '', $message = 'action successful', $code = 200)
    {
        $response = ['status' => 'success'];

        if ($message != '') {
            $response['message'] = $message;
        }

        if ($data != '') {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}
