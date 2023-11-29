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
                    <td style="width: 150px;">Agency</td>
                    <td>{{ $certification ? $certification->agency : ''}}</td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>{{ $certification ? $certification->start_date : ''}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $certification ? $certification->status : ''}}</td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td>{{ $certification ? $certification->notes : ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
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
                    <td>{{ $certification ? $certification->count : ''}}</td>
                </tr>
                <tr>
                    <td>Notification</td>
                    <td>{{ $certification ? $certification->notification : ''}}</td>
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
                    <td>{{ $consultation ? $consultation->service : ''}}</td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>{{$consultation ? $consultation->start_date : ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table colorWheat">
            <tbody>
                <tr>
                    <td style="width: 150px;">Status</td>
                    <td>{{ $consultation ? $consultation->status : ''}}</td>
                </tr>
                <tr>
                    <td>Surveillance 2</td>
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