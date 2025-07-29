<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/admin/bookings",
     *     summary="Get user's bookings",
     *     tags={"Bookings"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of user bookings",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Booking")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $bookings = Booking::all();
        return BookingResource::collection($bookings);
    }

      /**
     * @OA\Get(
     *     path="/api/bookings",
     *     summary="List logged-in user's bookings",
     *     tags={"Bookings"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List logged-in user's bookings",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Booking")
     *         )
     *     )
     * )
     */
    public function userAllBooking(Request $request){
         $bookings = $request->user()->bookings;
         return BookingResource::collection($bookings);
    }

    /**
     * @OA\Post(
     *     path="/api/bookings",
     *     summary="Create a new booking",
     *     tags={"Bookings"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="service_id", type="integer", example=1),
     *             @OA\Property(property="booking_date", type="string", format="date", example="2025-08-01")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Booking created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Booking created successfully"),
     *             @OA\Property(property="booking", ref="#/components/schemas/Booking")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function store(BookingRequest $request)
    {
        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'status' => 'pending',
        ]);

        $booking->load(['service', 'user']);

        return response()->json([
            'message' => 'Booking created successfully',
            'booking' => new BookingResource($booking)
        ], 201);
    }
}