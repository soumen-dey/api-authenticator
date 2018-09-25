<?php

namespace Soumen\Authenticator\Traits\Response;

trait HasJsonResponse
{
    protected $errorCode = 401;
    protected $successCode = 200;

    /**
     * Send response.
     *
     * @return Response
     * @author Soumen Dey
     */
    public function sendResponse($message, $code = null)
    {
        $code = $code ?? $this->getDefaultSuccessCode();
        
        return response()->json($message, $code);
    }
    
    /**
     * Send the error response.
     *
     * @return Response
     * @author Soumen Dey
     */
    public function sendErrorResponse($message = 'unauthorized', $code = null)
    {
        $code = $code ?? $this->getDefaultErrorCode();
        
        return $this->sendResponse($message, $code);
    }

    /**
     * Getter for $this->errorCode
     *
     * @return $errorCode
     * @author Soumen Dey
     */
    public function getDefaultErrorCode()
    {
        return $this->errorCode;
    }
    
    /**
     * Getter for $this->successCode
     *
     * @return $successCode
     * @author Soumen Dey
     */
    public function getDefaultSuccessCode()
    {
        return $this->successCode;
    }
}