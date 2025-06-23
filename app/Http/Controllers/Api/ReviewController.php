<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ReviewApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allreviews = Review::with(['car', 'user'])->get();
        if ($allreviews->isEmpty()) {
            $reviewResponse = ReviewApiResponse::sendResponse(200, 'No Reviews Found',[]);
            return $reviewResponse;
        }
        else{
             $reviewResponse=ReviewApiResponse::sendResponse(200, 'All Reviews Retrieved Successfully',
        ReviewResource::collection($allreviews));
        return $reviewResponse ;
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
