<?php 

namespace App\Repositories\Client;
use App\Models\Client;
use Illuminate\Support\Arr;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @var model
     */
	private $model;

    /**
     * ClientRepository constructor.
     * @param Client $client
     */
	function __construct(Client $model)
	{
		$this->model = $model;
	}

	public function index($filter = [])
	{
		$model = $this->model;
        if (isset($filter['limit'])) {
            return $model->paginate((int) $filter['limit']);
        }
        return $model->all();
	}

	public function store($data)
	{
		$clientData = Arr::only(
            $data,
            [
                'name',
                'mobile',
                'email',
                'longitude',
                'latitude'
            ]
        );

        $clientData['location'] = 'https://maps.google.com/?q='.$clientData['latitude'].','.$clientData['longitude'];

        $insertClient = $this->model->create($clientData);
        
        return $insertClient->refresh();
	}

	public function show($client)
	{
		return $client;
	}

	public function update($client, $data)
	{
		$clientData = Arr::only(
            $data,
            [
                'name',
                'mobile',
                'email',
                'longitude',
                'latitude'
            ]
        );

        $clientData['location'] = 'https://maps.google.com/?q='.$clientData['latitude'].','.$clientData['longitude'];

        $client->update($clientData);
        
        return $client;
	}

	public function destroy($client)
	{
        $client->delete();
	}
}