<?php

namespace App\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     description="User model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", example="john@example.com"),
 *     @OA\Property(property="role", type="string", enum={"customer", "admin"}, example="customer"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-15T10:30:00.000000Z")
 * )
 */
class UserSchema
{
    // This class is just for documentation purposes
}