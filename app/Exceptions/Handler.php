<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                // abort(404,'Get Rekt');
                // dd($exception->getStatusCode());
                return response()->view('errors.index',['error' => strval($exception->getStatusCode())], $exception->getStatusCode(),[]);
                return response()->json(['error' => 'Not Found'], $exception->getStatusCode());
                // dd($errorcode);
            }
        }
        if(get_class($exception) == "Illuminate\Database\Eloquent\ModelNotFoundException") {
            // return (new Response('Model not found', 400));
            // $exception->getStatusCode();
            return response()->view('errors.index',['error' => strval(404)],404,[]);

        }
        return parent::render($request, $exception);
    }
}
