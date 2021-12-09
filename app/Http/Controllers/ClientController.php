<?php

namespace App\Http\Controllers;

use App\Services\Client\ClientServiceInterface;
use App\Http\Requests\ClientFormRequest;
use App\Http\Resources\ClientResource;
use App\Http\Utility\ResponseType;

class ClientController extends Controller
{
    /**
     * @var clientServiceInterface
     */
	private $clientServiceInterface;

    /**
     * BankAccountController constructor.
     * @param ClientServiceInterface $clientServiceInterface
     */
    public function __construct(ClientServiceInterface $clientServiceInterface) 
    {
    	$this->clientServiceInterface = $clientServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  ClientFormRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(ClientFormRequest $request)
    {
    	$clients = $this->clientServiceInterface->index($request->validated());
    	return ClientResource::collection($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientFormRequest $request
     * @return ClientResource
     */
    public function store(ClientFormRequest $request)
    {
    	$client = $this->clientServiceInterface->store($request->validated());
    	return new ClientResource($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  $client
     * @return BankAccountResource
     */
    public function show($client)
    {
    	$client = $this->clientServiceInterface->show($client);
    	return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClientFormRequest  $request
     * @param  $client
     * @return ClientResource
     */
    public function update($client, ClientFormRequest $request)
    {
    	$client = $this->clientServiceInterface->update($client, $request->validated());
    	return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $client
     * @return ClientResource
     */
    public function destroy($client)
    {
    	$client = $this->clientServiceInterface->destroy($client);
        return new ClientResource(ResponseType::simpleResponse('Client has been deleted', true));
    }
}