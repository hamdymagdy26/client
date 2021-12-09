<?php 

namespace App\Services\Client;
use App\Repositories\Client\ClientRepositoryInterface;

class ClientService implements ClientServiceInterface
{
	/**
     * @var clientRepositoryInterface
     */
	private $clientRepositoryInterface;

	/**
     * ClientService constructor.
     * @param ClientRepositoryInterface $clientRepositoryInterface
     */
	function __construct(ClientRepositoryInterface $clientRepositoryInterface)
	{
		$this->clientRepositoryInterface = $clientRepositoryInterface;
	}

	public function index($request)
	{
		$clients = $this->clientRepositoryInterface->index($request);
		return $clients;
	}

	public function store($request)
	{
		$clients = $this->clientRepositoryInterface->store($request);
		return $clients;
	}

	public function show($user)
	{
		$clients = $this->clientRepositoryInterface->show($user);
		return $clients;
	}

	public function update($user, $request)
	{
		$clients = $this->clientRepositoryInterface->update($user, $request);
		return $clients;
	}

	public function destroy($request)
	{
		$clients = $this->clientRepositoryInterface->destroy($request);
		return $clients;
	}
}