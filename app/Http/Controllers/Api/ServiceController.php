<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/services",
     *     summary="Get list of available services",
     *     tags={"Services"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of services",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Service")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $services = Service::active()->get();
        return ServiceResource::collection($services);
    }

    /**
     * @OA\Post(
     *     path="/api/services/store",
     *     summary="Create a new service (Admin only)",
     *     tags={"Services"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Web Development"),
     *             @OA\Property(property="description", type="string", example="Complete web development service"),
     *             @OA\Property(property="price", type="number", format="float", example=1500.00),
     *             @OA\Property(property="status", type="string", enum={"active", "inactive"}, example="active")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Service created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Service created successfully"),
     *             @OA\Property(property="service", ref="#/components/schemas/Service")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Admin access required",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized")
     *         )
     *     )
     * )
     */
    public function store(ServiceRequest $request)
    {
        
        $service = Service::create($request->validated());
        
        return response()->json([
            'message' => 'Service created successfully',
            'service' => new ServiceResource($service)
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/services/{service}",
     *     summary="Get a specific service",
     *     tags={"Services"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="service",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Service details",
     *         @OA\JsonContent(ref="#/components/schemas/Service")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Service not found"
     *     )
     * )
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    /**
     * @OA\Put(
     *     path="/api/services/{service}",
     *     summary="Update a service (Admin only)",
     *     tags={"Services"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="service",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Updated Web Development"),
     *             @OA\Property(property="description", type="string", example="Updated description"),
     *             @OA\Property(property="price", type="number", format="float", example=1800.00),
     *             @OA\Property(property="status", type="string", enum={"active", "inactive"}, example="active")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Service updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Service updated successfully"),
     *             @OA\Property(property="service", ref="#/components/schemas/Service")
     *         )
     *     )
     * )
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        
        return response()->json([
            'message' => 'Service updated successfully',
            'service' => new ServiceResource($service)
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/services/{service}",
     *     summary="Delete a service (Admin only)",
     *     tags={"Services"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="service",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Service deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Service deleted successfully")
     *         )
     *     )
     * )
     */
    public function destroy(Service $service)
    {
        $service->delete();
        
        return response()->json([
            'message' => 'Service deleted successfully'
        ]);
    }
}