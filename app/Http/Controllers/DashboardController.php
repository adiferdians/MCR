<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Client;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $certificationActive = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
        //     ->where('clients.service', '=', 'Certification')
        //     ->where('service_certifications.status', '=', 'Active')
        //     ->count();
        // $certificationWithdraw = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
        //     ->where('clients.service', '=', 'Certification')
        //     ->where('service_certifications.status', '=', 'Withdraw')
        //     ->count();
        // $certificationSuspended = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
        //     ->where('clients.service', '=', 'Certification')
        //     ->where('service_certifications.status', '=', 'Suspended')
        //     ->count();

        $consultationDone = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('clients.service', '=', 'Consultation')
            ->where('service_consultations.status', '=', 'Done')
            ->count();
        $consultationOnProgress = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('clients.service', '=', 'Consultation')
            ->where('service_consultations.status', '=', 'On Progress')
            ->count();
        $consultationPending = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('clients.service', '=', 'Consultation')
            ->where('service_consultations.status', '=', 'Pending')
            ->count();
        $consultationOverdue = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('clients.service', '=', 'Consultation')
            ->where('service_consultations.status', '=', 'Overdue')
            ->count();

        $certificateActive = Certificate::where('status', '=', 'Active')->count();
        $certificateWithdraw = Certificate::where('status', '=', 'Withdraw')->count();
        $certificateSuspended = Certificate::where('status', '=', 'Suspended')->count();


        return view('admin.dashboard.index', [
            'countCertificateActive' => $certificateActive,
            'countCertificateWithdraw' => $certificateWithdraw,
            'countCertificateSuspended' => $certificateSuspended,
            // 'countCertificationActive' => $certificationActive,
            // 'countCertificationWithdraw' => $certificationWithdraw,
            // 'countCertificationSuspended' => $certificationSuspended,
            'countConsultationDone' => $consultationDone,
            'countConsultationOnProgress' => $consultationOnProgress,
            'countConsultationPending' => $consultationPending,
            'countConsultationOverdue' => $consultationOverdue,
        ]);
    }
}
