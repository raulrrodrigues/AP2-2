<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    
    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nome' => 'required|string|max:200',
            'ano de nascimento' => 'required|string|max:4',
            'cpf' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
            
        }

        $customer = Cliente::create($request->all());
        return ApiResponse::ok('Cadastro efetuado com sucesso! ', $customer);
    
    }
    public function listarTodos()
    {
        $customer = Cliente::all();
        return ApiResponse::ok('Cadastro de Clientes', $customer);
    }
    public function listarPeloId(int $id)
    {
        $customer = Cliente::findOrFail($id);
        return ApiResponse::ok('Cliente Selecionado', $customer);

    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'ano de nascimento' => 'required|string|max:4',
            'cpf' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
            
        }

        $customer = Cliente::findOrFail($id);
        $customer->update($request->all());

        return ApiResponse::ok('Cliente atualizado com sucesso', $customer);
    }

    public function remover(int $id)
    {
        $customer = Cliente::findOrFail($id);
        $customer->delete();

        return ApiResponse::ok('Cliente removido com sucesso', $customer);

    }

    

}
