@foreach($certificate as $cert)
<div class="input-split">
    <div class="col-lg-6">
        <input type="text" id="id" value="{{$cert->id}}" hidden>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" value="{{$cert->name}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" value="{{$cert->type}}" placeholder="Type">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" value="{{$cert->title}}" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" rows="4" placeholder="Address"> {{$cert->address}} </textarea>
        </div>
        <div class="form-group">
            <label for="scope">Scope</label>
            <textarea class="form-control" id="scope" rows="4" placeholder="Scope">{{$cert->scope}} </textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" value="{{$cert->date}}">
        </div>
        <div class="form-group">
            <label for="surveillance_1">Surveillance 1</label>
            <input type="date" class="form-control" id="surveillance_1" value="{{$cert->surveillance_1}}">
        </div>
        <div class="form-group">
            <label for="surveillance_2">Surveillance 2</label>
            <input type="date" class="form-control" id="surveillance_2" value="{{$cert->surveillance_2}}">
        </div>
        <div class="form-group">
            <label for="effective">Effective</label>
            <input type="date" class="form-control" id="effective" value="{{$cert->effective}}">
        </div>
        <button type="submit" class="btn btn-primary mr-2" id="update">Submit</button>
        <button class="btn btn-dark">Cancel</button>
    </div>
</div>
@endforeach
<script>
    $('#update').click(function() {
        const id = $('#id').val();
        const name = $('#name').val();
        const type = $('#type').val();
        const title = $('#title').val();
        const address = $('#address').val();
        const scope = $('#scope').val();
        const effective = $('#effective').val();
        const surveillance_1 = $('#surveillance_1').val();
        const surveillance_2 = $('#surveillance_2').val();
        const date = $('#date').val();

        axios.post('/certificate/sendUpdate/' + id, {
            name,
            type,
            title,
            address,
            scope,
            effective,
            surveillance_1,
            surveillance_2,
            date
        }).then((response) => {
            Swal.fire({
                title: 'Success...',
                position: 'top-end',
                icon: 'success',
                text: 'Success! Data updated successfully.',
                showConfirmButton: false,
                width: '400px',
                timer: 3000
            }).then((response) => {
                location.reload();
            })
        }).catch((err) => {
            Swal.fire({
                title: 'Error',
                position: 'top-end',
                icon: 'error',
                text: err.response.data.error.details,
                showConfirmButton: false,
                width: '400px',
                timer: 3000
            })
        })
    })
</script>