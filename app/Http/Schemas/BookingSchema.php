<?php

namespace App\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="Booking",
 *     type="object",
 *     title="Booking",
 *     description="Booking model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="booking_date", type="string", format="date", example="2025-08-01"),
 *     @OA\Property(property="status", type="string", enum={"pending", "confirmed", "cancelled"}, example="pending"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-15T10:30:00.000000Z"),
 *     @OA\Property(property="service", ref="#/components/schemas/Service"),
 *     @OA\Property(property="user", ref="#/components/schemas/User")
 * )
 */
class BookingSchema
{
    // This class is just for documentation purposes
}