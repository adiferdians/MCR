<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\serviceCertification;
use App\Models\surveillanceCertification;
use App\Models\detilCertification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::join('service_certifications', 'clients.client_id', '=', 'service_certifications.service_id')
            ->join('surveillance_certifications', 'service_certifications.survelliance_id', '=', 'surveillance_certifications.survelliance_id')
            ->select('clients.company_name','clients.address','clients.company_contact','clients.pic', 'service_certifications.name',
            'service_certifications.agency','service_certifications.status','service_certifications.notes', 'surveillance_certifications.surveillance_1',
            'surveillance_certifications.surveillance_2', 'surveillance_certifications.count','surveillance_certifications.notification',)
            ->paginate(10);

        return view('admin.client.client', [
            'client' => $client,
        ]);
    }

    function create()
    {
        return view("admin.client.clientCreate");
    }

    function send(Request $request)
    {
        // $validate = Validator::make($request->all(), [
        //     'company_name' => "required",
        //     'address' => "required",
        //     'pic' => "required",
        //     'company_contact' => "required",
        //     'pic_contact' => "required",
        //     'service' => "required",
        //     'service_detil' => "required", 
        //     'name' => "required",
        //     'agency' => "required",
        //     'start_date' => "required",
        //     'status' => "required",
        //     'notes' => "required",
        //     'surveillance_1' => "required",
        //     'surveillance_2' => "required",
        //     'count' => "required",
        //     'notification' => "required",
        // ]);

        // if ($validate->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'messages' => $validate->messages()
        //     ], 422);
        // }

        DB::beginTransaction();
        try {
            $dataSurvelliance = [
                'surveillance_1' => $request->surveillance_1,
                'surveillance_2' => $request->surveillance_2,
                'count' => $request->count,
                'notification' => $request->notification,
            ];
            $surveillance = SurveillanceCertification::create($dataSurvelliance);
            $surveillanceId = $surveillance->id;

            $dataCertification = [
                'name' => $request->service,
                'agency' => $request->agency,
                'start_date' => $request->startDate,
                'status' => $request->status,
                'notes' => $request->notes,
                'survelliance_id' => $surveillanceId
            ];
            $certification = ServiceCertification::create($dataCertification);
            $certificationId = $certification->id;

            $dataClient = [
                'company_name' => $request->companyName,
                'address' => $request->address,
                'pic' => $request->pic,
                'company_contact' => $request->contact,
                'pic_contact' => $request->picContact,
                'service' => $request->service,
                'service_detil' => "",
                'service_id' => $certificationId
            ];
            $client = Client::create($dataClient);
            $clientId = $client->id;

            $dataDetil = [
                'id_company' => $clientId,
                'id_certification' => $certificationId,
                'id_surveillance' => $surveillanceId,
            ];

            detilCertification::insert($dataDetil);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $dataDetil], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }
}
