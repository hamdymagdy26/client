<?php 

namespace App\Services\Client;

interface ClientServiceInterface
{
	public function index($request);

	public function store($request);

	public function show($client);

	public function update($client, $request);

	public function destroy($request);
}
