<?php

namespace App\Exceptions;

use App\Helpers\LogActivity;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\ControllerDoesNotReturnResponseException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Illuminate\Routing\Exceptions\UrlGenerationException;
use ErrorException;
use Illuminate\Http\Exceptions\PostTooLargeException;
use BadMethodCallException;
use GuzzleHttp\Exception\TooManyRedirectsException;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function shouldReport(Throwable $exception)
    {
    }
    /**
     * Render an exception into an HTTP response.php
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if (
            $exception instanceof MethodNotAllowedHttpException
            || $exception instanceof ControllerDoesNotReturnResponseException
            || $exception instanceof BadRequestHttpException
            || $exception instanceof TooManyRequestsHttpException
            || $exception instanceof UrlGenerationException
            || $exception instanceof PostTooLargeException
            || $exception instanceof ErrorException
            || $exception instanceof BadMethodCallException
            || $exception instanceof TooManyRedirectsException
        ) {
            $kalimat = 'Error: ' . $exception->getMessage();
            LogActivity::addToLog($kalimat, 'Error');
            return redirect('/home')
                ->with([
                    'error' => $kalimat
                ]);
        }
        if ($exception instanceof NotFoundHttpException) {
            if ($request->is('api/*')) {
                $kalimat = 'Error: ' . $exception->getMessage();
                LogActivity::addToLog($kalimat, 'Error Akses mobile apps');
                return response()->json([
                    'error' => true,
                    'message' => 'Not Found'
                ], 404);
            }
            return redirect('/');
        }
        if ($exception instanceof UnauthorizedException) {
            $kalimat = 'Forbidden & ' . $exception->getMessage();
            LogActivity::addToLog($kalimat, 'Error Akses mobile apps');
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => true,
                    'message' => $kalimat
                ], 403);
            }
        }
        return parent::render($request, $exception);
    }
    public function renderForConsole($output, Throwable $exception)
    {

    }
}
