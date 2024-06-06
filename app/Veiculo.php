<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Veiculo extends Model
{
    use SoftDeletes;

    protected $table = 'veiculos';

    protected $fillable = ['placa', 'renavam', 'modelo', 'marca', 'ano', 'proprietario_id'];

    public static function validateData($data, $id = null)
    {
        $uniquePlaca = 'unique:veiculos,placa' . ($id ? ',' . $id : '');
        $uniqueRenavam = 'unique:veiculos,renavam' . ($id ? ',' . $id : '');

        return Validator::make($data, [
            'placa' => ['required', 'regex:/^[A-Z]{3}[0-9]{4}$/', $uniquePlaca],
            'renavam' => ['required', $uniqueRenavam],
        ], [
            'placa.unique' => 'A placa já está cadastrada.',
            'renavam.unique' => 'O renavam já está cadastrado.',
        ]);
    }

    public function proprietario()
    {
        return $this->belongsTo(User::class, 'proprietario_id');
    }
}
