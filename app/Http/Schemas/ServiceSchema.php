<?php

namespace App\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="Service",
 *     type="object",
 *     title="Service",
 *     description="Service model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Web Development"),
 *     @OA\Property(property="description", type="string", example="Complete web development service"),
 *     @OA\Property(property="price", type="number", format="float", example=1500.00),
 *     @OA\Property(property="status", type="string", enum={"active", "inactive"}, example="active"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-15T10:30:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-01-15T10:30:00.000000Z")
 * )
 */
class ServiceSchema
{
    // This class is just for documentation purposes
}