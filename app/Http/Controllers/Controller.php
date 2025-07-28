<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="Service Booking System API",
 *         description="API documentation for the Service Booking System"
 *     ),
 *     @OA\Server(
 *         url="http://localhost:8000",
 *         description="Local Development Server"
 *     ),
 *     @OA\Server(
 *         url="https://your-production-domain.com",
 *         description="Production Server"
 *     )
 * )
 */

abstract class Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
