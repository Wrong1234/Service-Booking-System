<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Service Booking System API",
 *     description="API documentation for the Service Booking System",
 *     @OA\Contact(
 *         email="admin@gmail.com"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Local Development Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Enter token in format: Bearer <your-token-here>"
 * )
 */


abstract class Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
