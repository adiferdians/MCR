<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\serviceCertification;
use App\Models\surveillanceCertification;
use App\Models\serviceConsultation;
use App\Models\Standard;
use App\Models\Broker;
use App\Models\certification_body;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clientCertification = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
            ->join('surveillance_certifications', 'service_certifications.surveillance_id', '=', 'surveillance_certifications.surveillance_id')
            ->select(
                'clients.client_id',
                'clients.company_name',
                'clients.company_contact',
                'clients.pic',
                'clients.address',
                'service_certifications.certification_id',
                'service_certifications.name',
                'service_certifications.notes',
                'surveillance_certifications.surveillance_1',
                'surveillance_certifications.surveillance_2',
                'surveillance_certifications.count',
            )
            ->where('clients.service', '=', 'Certification')
            ->orderBy('client_id', 'desc')
            ->paginate($perPage = 10, $columns = ['*'], $pageName = 'Certification');

        $clientConsultation = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('clients.service', '=', 'Consultation')
            ->orderBy('client_id', 'desc')
            ->paginate($perPage = 10, $columns = ['*'], $pageName = 'Consultation');

        return view('admin.client.client', [
            'clientCertification' => $clientCertification,
            'clientConsultation' => $clientConsultation
        ]);
    }

    function create()
    {
        $broker = Broker::orderBy('name', 'asc')->get()->all();
        $standard = Standard::orderBy('name', 'asc')->get()->all();
        $certBody = certification_body::orderBy('name', 'asc')->get()->all();
        return view("admin.client.clientCreate", [
            'standard' => $standard,
            'certBody' => $certBody,
            'broker' => $broker,
        ]);
    }

    function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'companyName' => "required",
            'address' => "required",
            'pic' => "required",
            'contact' => "required",
            'picContact' => "required",
            'service' => "required",
            'certStandard' => $request->service == "Certification" ? "required" : "",
            'certBody' => $request->service == "Certification" ? "required" : "",
            'certPrice' => $request->service == "Certification" ? "required" : "",
            'projName' => $request->service == "Certification" ? "required" : "",
            'startDate' => $request->service == "Certification" ? "required" : "",
            'notes' => $request->service == "Certification" ? "required" : "",
            'surveillance_1' => $request->service == "Certification" ? "required" : "",
            'surveillance_2' => $request->service == "Certification" ? "required" : "",
            'count' => $request->service == "Certification" ? "required" : "",
            'consultationNotes' => $request->service == "Consultation" ? "required" : "",
            'consultationStartDate' => $request->service == "Consultation" ? "required" : "",
            'consultationStatus' => $request->service == "Consultation" ? "required" : ""
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Validation Vailed!!',
                    'details' => $validate->errors()->all()
                ]
            ], 422);
        }

        DB::beginTransaction();
        try {
            $certBody = $request->certBody;
            $certBody_2 = $request->certBody_2;
            $certBody_3 = $request->certBody_3;
            $certBody_4 = $request->certBody_4;

            $certPrice = $request->certPrice;
            $certPrice_2 = $request->certPrice_2;
            $certPrice_3 = $request->certPrice_3;
            $certPrice_4 = $request->certPrice_4;

            $certStandard = $request->certStandard;
            $certStandard_2 = $request->certStandard_2;
            $certStandard_3 = $request->certStandard_3;
            $certStandard_4 = $request->certStandard_4;


            $projDetil = [
                'Certificate Standard' => $certStandard,
                'Certificate Body' => $certBody,
                'Certificate Price' => $certPrice,

                'Certificate Standard 2' => $certStandard_2,
                'Certificate Body 2' => $certBody_2,
                'Certificate Price 2' => $certPrice_2,

                'Certificate Standard 3' => $certStandard_3,
                'Certificate Body 3' => $certBody_3,
                'Certificate Price 3' => $certPrice_3,

                'Certificate Body 4' => $certBody_4,
                'Certificate Price 4' => $certPrice_4,
                'Certificate Standard 4' => $certStandard_4,
            ];

            $consPrice = $request->consPrice;
            $consPrice_2 = $request->consPrice_2;
            $consPrice_3 = $request->consPrice_3;
            $consPrice_4 = $request->consPrice_4;

            $consStandard = $request->consStandard;
            $consStandard_2 = $request->consStandard_2;
            $consStandard_3 = $request->consStandard_3;
            $consStandard_4 = $request->consStandard_4;

            $consProjDetil = [
                'Consultation Standard' => $consStandard,
                'Consultation Price' => $consPrice,

                'Consultation Standard 2' => $consStandard_2,
                'Consultation Price 2' => $consPrice_2,

                'Consultation Standard 3' => $consStandard_3,
                'Consultation Price 3' => $consPrice_3,

                'Consultation Standard 4' => $consStandard_4,
                'Consultation Price 4' => $consPrice_4,
            ];

            $dataProjectCertification = json_encode($projDetil);
            $dataProjectConsultation = json_encode($consProjDetil);

            if ($request->service == "Certification") {
                $dataSurvelliance = [
                    'surveillance_1' => $request->surveillance_1,
                    'surveillance_2' => $request->surveillance_2,
                    'count' => $request->count,
                ];
                $surveillance = SurveillanceCertification::create($dataSurvelliance);
                $surveillanceId = $surveillance->id;

                $dataCertification = [
                    'name' => $request->projName,
                    'start_date' => $request->startDate,
                    'notes' => $request->notes,
                    'project_detil' => $dataProjectCertification,
                    'broker' => $request->brokerCertification,
                    'broker_price' => $request->brokerPriceCertification,
                    'surveillance_id' => $surveillanceId
                ];
                $certification = ServiceCertification::create($dataCertification);
                $certificationId = $certification->id;
            } else if ($request->service == "Consultation") {
                $dataConsultation = [
                    'name' => $request->consProjName,
                    'start_date' => $request->consultationStartDate,
                    'project_detil' => $dataProjectConsultation,
                    'broker' => $request->brokerConsultation,
                    'broker_price' => $request->brokerPriceConsultation,
                    'status' => $request->consultationStatus,
                    'notes' => $request->consultationNotes,
                ];
                $consultation = serviceConsultation::create($dataConsultation);
                $consultationId = $consultation->id;
            }


            $dataClient = [
                'company_name' => $request->companyName,
                'address' => $request->address,
                'pic' => $request->pic,
                'company_contact' => $request->contact,
                'pic_contact' => $request->picContact,
                'service' => $request->service,
                'service_id' => ($request->service == "Certification") ? $certificationId : $consultationId
            ];

            Client::create($dataClient);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan'], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage(), 'line' => $e->getLine()], 400);
        }
    }

    function detailClient($id)
    {
        $clientCertification = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
            ->join('surveillance_certifications', 'service_certifications.surveillance_id', '=', 'surveillance_certifications.surveillance_id')
            ->where('client_id', $id)
            ->first();

        $clientConsultation = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('client_id', $id)
            ->first();

        return view('admin.client.clientView', [
            'certification' => $clientCertification,
            'consultation' => $clientConsultation
        ]);
    }

    function getUpdate($id)
    {
        $clientCertification = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
            ->join('surveillance_certifications', 'service_certifications.surveillance_id', '=', 'surveillance_certifications.surveillance_id')
            ->where('client_id', $id)
            ->first();

        $clientConsultation = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('client_id', $id)
            ->first();

        $broker = Broker::orderBy('name', 'asc')->get()->all();
        $standard = Standard::orderBy('name', 'asc')->get()->all();
        $certBody = certification_body::orderBy('name', 'asc')->get()->all();

        return view('admin.client.clientUpdate', [
            'certification' => $clientCertification,
            'consultation' => $clientConsultation,
            'standard' => $standard,
            'certBody' => $certBody,
            'broker' => $broker,
        ]);
    }

    function sendUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'companyName' => "required",
            'address' => "required",
            'pic' => "required",
            'contact' => "required",
            'picContact' => "required",
            'service' => "required",
            'startDate' => $request->service == "Certification" ? "required" : "",
            'notes' => $request->service == "Certification" ? "required" : "",
            'surveillance_1' => $request->service == "Certification" ? "required" : "",
            'surveillance_2' => $request->service == "Certification" ? "required" : "",
            'count' => $request->service == "Certification" ? "required" : "",
            'consultationNotes' => $request->service == "Consultation" ? "required" : "",
            'consultationStartDate' => $request->service == "Consultation" ? "required" : "",
            'consultationStatus' => $request->service == "Consultation" ? "required" : ""
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Validation Vailed!!',
                    'details' => $validate->errors()->all()
                ]
            ], 422);
        }


        DB::beginTransaction();
        try {
            $clientCertification = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
                ->join('surveillance_certifications', 'service_certifications.surveillance_id', '=', 'surveillance_certifications.surveillance_id')
                ->where('clients.client_id', '=', $id)
                ->first();

            $clientConsultationId = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
                ->where('clients.client_id', '=', $id)
                ->first();

            $certBody = $request->certBody;
            $certBody_2 = $request->certBody_2;
            $certBody_3 = $request->certBody_3;
            $certBody_4 = $request->certBody_4;

            $certPrice = $request->certPrice;
            $certPrice_2 = $request->certPrice_2;
            $certPrice_3 = $request->certPrice_3;
            $certPrice_4 = $request->certPrice_4;

            $certStandard = $request->certStandard;
            $certStandard_2 = $request->certStandard_2;
            $certStandard_3 = $request->certStandard_3;
            $certStandard_4 = $request->certStandard_4;

            $projDetil = [
                'Certificate Standard' => $certStandard,
                'Certificate Body' => $certBody,
                'Certificate Price' => $certPrice,

                'Certificate Standard 2' => $certStandard_2,
                'Certificate Body 2' => $certBody_2,
                'Certificate Price 2' => $certPrice_2,

                'Certificate Standard 3' => $certStandard_3,
                'Certificate Body 3' => $certBody_3,
                'Certificate Price 3' => $certPrice_3,

                'Certificate Body 4' => $certBody_4,
                'Certificate Price 4' => $certPrice_4,
                'Certificate Standard 4' => $certStandard_4,
            ];

            $consPrice = $request->consPrice;
            $consPrice_2 = $request->consPrice_2;
            $consPrice_3 = $request->consPrice_3;
            $consPrice_4 = $request->consPrice_4;

            $consStandard = $request->consStandard;
            $consStandard_2 = $request->consStandard_2;
            $consStandard_3 = $request->consStandard_3;
            $consStandard_4 = $request->consStandard_4;

            $consProjDetil = [
                'Consultation Standard' => $consStandard,
                'Consultation Price' => $consPrice,

                'Consultation Standard 2' => $consStandard_2,
                'Consultation Price 2' => $consPrice_2,

                'Consultation Standard 3' => $consStandard_3,
                'Consultation Price 3' => $consPrice_3,

                'Consultation Standard 4' => $consStandard_4,
                'Consultation Price 4' => $consPrice_4,
            ];

            $dataProjectCertification = json_encode($projDetil);
            $dataProjectConsultation = json_encode($consProjDetil);

            if ($request->service == "Certification") {
                $dataSurvelliance = [
                    'surveillance_1' => $request->surveillance_1,
                    'surveillance_2' => $request->surveillance_2,
                    'count' => $request->count,
                ];

                if (empty($clientCertification->surveillance_id)) {
                    $surveillance = SurveillanceCertification::create($dataSurvelliance);
                    $surveillanceId = $surveillance->id;

                    $deleteColsultation = new serviceConsultation();
                    $deleteColsultation->where('consultation_id', $clientConsultationId->consultation_id)->delete();
                } else {
                    SurveillanceCertification::where('surveillance_id', $clientCertification->surveillance_id)->update($dataSurvelliance);
                }

                $dataCertification = [
                    'name' => $request->projName,
                    'project_detil' => $dataProjectCertification,
                    'broker' => $request->brokerCertification,
                    'broker_price' => $request->brokerPriceCertification,
                    'start_date' => $request->startDate,
                    'notes' => $request->notes,
                    'surveillance_id' => $clientCertification ? $clientCertification->surveillance_id : $surveillanceId
                ];

                if (empty($clientCertification)) {
                    $certification = ServiceCertification::create($dataCertification);
                    $certificationId = $certification->id;
                } else {
                    ServiceCertification::where('certification_id', $clientCertification->service_id)->update($dataCertification);
                }
            } else if ($request->service == "Consultation") {
                $dataConsultation = [
                    'name' => $request->projName,
                    'start_date' => $request->consultationStartDate,
                    'project_detil' => $dataProjectConsultation,
                    'broker' => $request->brokerConsultation,
                    'broker_price' => $request->brokerPriceConsultation,
                    'status' => $request->consultationStatus,
                    'notes' => $request->consultationNotes,
                ];

                if ($request->service == "Certification" || $clientConsultationId) {
                    ServiceConsultation::where('consultation_id', $clientConsultationId->consultation_id)->update($dataConsultation);
                } else {
                    $consultant = ServiceConsultation::create($dataConsultation);
                    $consultantId = $consultant->id;

                    $deleteCertificate = new ServiceCertification();
                    $deleteCertificate->where('certification_id', $clientCertification->certification_id)->delete();

                    $deleteSurvelliance = new SurveillanceCertification();
                    $deleteSurvelliance->where('surveillance_id', $clientCertification->surveillance_id)->delete();
                }
            };

            $dataClient = [
                'company_name' => $request->companyName,
                'address' => $request->address,
                'pic' => $request->pic,
                'company_contact' => $request->contact,
                'pic_contact' => $request->picContact,
                'service' => $request->service,
                'service_id' =>  $request->service == "Certification" ?
                    ($clientCertification ? $clientCertification->service_id : $certificationId) : ($clientConsultationId ? $clientConsultationId->consultation_id : $consultantId)
            ];

            Client::where('client_id', $id)->update($dataClient);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan'], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage(), 'line' => $e->getLine()], 400);
        }
    }

    public function changeStatus(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'status'   => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Validation Vailed!!',
                    'details' => $validate->errors()->all()
                ]
            ], 422);
        }

        DB::beginTransaction();
        try {
            $data = [
                'status' => $request->status,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            serviceCertification::where('certification_id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function changeConsultantStatus(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'status'   => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Validation Vailed!!',
                    'details' => $validate->errors()->all()
                ]
            ], 422);
        }

        DB::beginTransaction();
        try {
            $data = [
                'status' => $request->status,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            serviceConsultation::where('consultation_id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    function deleteClient($id)
    {
        $clientCertification = Client::join('service_certifications', 'clients.service_id', '=', 'service_certifications.certification_id')
            ->join('surveillance_certifications', 'service_certifications.surveillance_id', '=', 'surveillance_certifications.surveillance_id')
            ->where('client_id', $id)
            ->first();

        $clientConsultation = Client::join('service_consultations', 'clients.service_id', '=', 'service_consultations.consultation_id')
            ->where('client_id', $id)
            ->first();

        if ($clientCertification) {
            $client = new client();
            $client->where('client_id', $id)->delete();

            $certification = new ServiceCertification();
            $certification->where('certification_id', $clientCertification->certification_id)->delete();

            $surveilance = new surveillanceCertification();
            $surveilance->where('surveillance_id', $clientCertification->surveillance_id)->delete();
        } elseif ($clientConsultation) {
            $data = new client();
            $data->where('client_id', $id)->delete();

            $consultation = new serviceConsultation();
            $consultation->where('consultation_id', $clientConsultation->consultation_id)->delete();
        }
    }
}
