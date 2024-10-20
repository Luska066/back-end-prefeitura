<?php

namespace Database\Seeders;

use App\Http\Enum\EstruturaOrganizacional\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::Prefeito->value
        ]);
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::VicePrefeito->value
        ]);
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::Assessor->value
        ]);
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::Comissao->value
        ]);
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::Funcionario->value
        ]);
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::Gabinete->value
        ]);
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::Tesoureiro->value
        ]);
        \App\Models\CargosPessoaJuridica::create([
            'nome' => Cargo::Secretario->value
        ]);
    }
}
