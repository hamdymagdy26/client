<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class ClientFormRequest
 * @package App\Http\Requests
 */
class ClientFormRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $method = $request->getMethod();
        $action = $request->route()->getActionMethod();

        if ($method === 'POST') {
            if ($action === 'store') {
                return [
                    'name' => 'required|unique:clients,name',
                    'email' => 'required|email|unique:clients,email',
                    'mobile' => 'required|unique:clients,mobile',
                    'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                    'longitude' => ['required' , 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
                    'location' => 'sometimes|string'
                ];
            }
        } else if ($method === 'PUT') {
            if ($action === 'update') {
                return [
                    'name' => ['sometimes', 'string', Rule::unique('clients', 'name')->ignore($this->client)],
                    'email' => ['sometimes', 'email', 'string', Rule::unique('clients', 'email')->ignore($this->client)],
                    'mobile' => ['sometimes', 'string', Rule::unique('clients', 'mobile')->ignore($this->client)],
                    'latitude' => ['sometimes', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                    'longitude' => ['sometimes' , 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
                    'location' => 'sometimes|string'
                ];
            }
        }

        if ($method === 'GET') {
            if ($action === 'index') {
                return [
                    'limit' => 'required|integer',
                ];
            }
        }
        return [];
    }
}
