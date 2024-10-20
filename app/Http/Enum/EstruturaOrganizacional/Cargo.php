<?php

namespace App\Http\Enum\EstruturaOrganizacional;

enum Cargo : string
{
    case Prefeito = 'Prefeito';
    case VicePrefeito = 'Vice-Prefeito';
    case Gabinete = 'Gabinete';
    case Secretario = 'Secretário';
    case Tesoureiro = 'Tesoureiro';
    case Assessor = 'Assessor';
    case Comissao = 'Comissão';
    case Funcionario = 'Funcionário';
}
