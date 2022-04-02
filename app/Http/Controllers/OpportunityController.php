<?php

namespace App\Http\Controllers;

use App\Actions\ApproveOpportunity;
use App\Actions\CreateOpportunity;
use App\Actions\ListOpportunity;
use App\Actions\RefuseOpportunity;
use App\Http\Requests\StoreOportunityRequest;
use App\Http\Resources\OpportunityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return OpportunityResource::collection(ListOpportunity::run());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return OpportunityResource
     */
    public function store(StoreOportunityRequest $request): OpportunityResource
    {
        return OpportunityResource::make(CreateOpportunity::run($request->validated(), Auth::guard('sanctum')->user()->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id): OpportunityResource
    {
        return OpportunityResource::make(ApproveOpportunity::run($id));
    }

    public function refuse($id): OpportunityResource
    {
        return OpportunityResource::make(RefuseOpportunity::run($id));
    }

}
