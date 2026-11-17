<?php

namespace App\Enums;

enum DocumentType: string
{
    case MEDICAL_CERTIFICATE = 'medical_certificate';
    case OCCUPATIONAL_CERTIFICATE = 'occupational_certificate';
    case TREATMENT_AUTHORIZATION = 'treatment_authorization';
    case CONFIDENTIALITY_AGREEMENT = 'confidentiality_agreement';

    public function label(){
        return match ($this) {
            DocumentType::MEDICAL_CERTIFICATE => 'Certificado Médico',
            DocumentType::OCCUPATIONAL_CERTIFICATE => 'Certificado Ocupacional',
            DocumentType::TREATMENT_AUTHORIZATION => 'Autorización de Tratamiento',
            DocumentType::CONFIDENTIALITY_AGREEMENT => 'Acuerdo de Confidencialidad',
            default => 'Sin Especificar',
        };
    }
}
