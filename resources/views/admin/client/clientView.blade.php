<input type="text" class="form-control" autocomplete="off" value="{{ $certification ? $certification->service : $consultation->service}}" id="service" hidden>
<div class="input-split">
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
                <tr>
                    <td style="width: 150px;">Company ID</td>
                    <td>{{ $certification ? $certification->client_id : $consultation->client_id}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $certification ? $certification->address : $consultation->address}}</td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td>{{ $certification ? $certification->pic : $consultation->pic}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
                <tr>
                    <td style="width: 150px;">Contact</td>
                    <td>{{ $certification ? $certification->company_contact : $consultation->company_contact}}</td>
                </tr>
                <tr>
                    <td>PIC Contact</td>
                    <td>{{ $certification ? $certification->pic_contact : $consultation->pic_contact}}</td>
                </tr>
                <tr>
                    <td>Service</td>
                    <td>{{ $certification ? $certification->service : $consultation->service}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="input-split" id="certificationForm">
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
                <tr>
                    <td style="width: 150px;">Project Name</td>
                    <td>{{ $certification ? $certification->name : ''}}</td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>{{ $certification ? $certification->start_date : ''}}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 30px;">Project Detail</td>
                    <td>
                        @if($certification)
                        @php
                        $projectDetil = $certification->project_detil;
                        $decodedData = json_decode($projectDetil, true); // Mengonversi ke array asosiatif
                        @endphp

                        @if($decodedData)
                        <table border="0">
                            <tbody>
                                @foreach($decodedData as $key => $value)
                                @if($value !== null)
                                <tr>
                                    <td style="border: 0; padding-left: 0px;">{{ $key }}</td>
                                    <td style="border: 0; padding-left: 0px;">{{ $value }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        Data tidak valid atau tidak ada.
                        @endif
                        @else
                        Data tidak ditemukan.
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
                <tr>
                    <td style="width: 150px;">Broker</td>
                    <td>{{ $certification ? $certification->broker : ''}}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Broker Price</td>
                    <td>{{ $certification ? $certification->broker_price : ''}}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Surveillance 1</td>
                    <td>{{ $certification ? $certification->surveillance_1 : ''}}</td>
                </tr>
                <tr>
                    <td>Surveillance 2</td>
                    <td>{{ $certification ? $certification->surveillance_2 : ''}}</td>
                </tr>
                <tr>
                    <td>Count</td>
                    <td>Surveillance {{ $certification ? $certification->count : ''}}</td>
                </tr>
                <tr>
                    <td>Notification</td>
                    <td> @php
                        if($certification){
                        if($certification->count == 1) {
                        $tanggalTarget = $certification->surveillance_1;
                        } else {
                        $tanggalTarget = $certification->surveillance_2;
                        }

                        $tanggalTarget_timestamp = strtotime($tanggalTarget);
                        $waktuSekarang_timestamp = time();
                        $selisih = $tanggalTarget_timestamp - $waktuSekarang_timestamp;

                        if ($selisih > 0) {
                        $hari = floor($selisih / (60 * 60 * 24));

                        echo "$hari Days";
                        } else {
                        echo "Passed";
                        }
                        }
                        @endphp
                    </td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td>{{ $certification ? $certification->notes : ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="input-split" id="consultationForm">
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
                <tr>
                    <td style="width: 150px;">Service Name</td>
                    <td>{{ $consultation ? $consultation->name : ''}}</td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>{{$consultation ? $consultation->start_date : ''}}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 30px;">Project Detail</td>
                    <td>
                        @if($consultation)
                        @php
                        $projectDetil = $consultation->project_detil;
                        $decodedData = json_decode($projectDetil, true);
                        @endphp

                        @if($decodedData)
                        <table border="0">
                            <tbody>
                                @foreach($decodedData as $key => $value)
                                @if($value !== null)
                                <tr>
                                    <td style="border: 0; padding-left: 0px;">{{ $key }}</td>
                                    <td style="border: 0; padding-left: 0px;">{{ $value }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        Data tidak valid atau tidak ada.
                        @endif
                        @else
                        Data tidak ditemukan.
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
                <tr>
                    <td style="width: 150px;">Broker</td>
                    <td>{{ $consultation ? $consultation->broker : ''}}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Broker Price</td>
                    <td>{{ $consultation ? $consultation->broker_price : ''}}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Status</td>
                    <td>{{ $consultation ? $consultation->status : ''}}</td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td>{{$consultation ? $consultation->notes : ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        const serviceVal = $('#service').val();
        if (serviceVal == "Certification") {
            $('#consultationForm').hide();
            $('#certificationForm').show();
        } else if (serviceVal == "Consultation") {
            $('#certificationForm').hide();
            $('#consultationForm').show();
        }
    });
</script>