@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row my-4">
    <h3 class="display-6 fw-light text-success">My Contact List</h3>
  </div>
  <div class="row">
    <div class="card">
      <div class="card-header mt-3">
        <div class="row d-flex justify-content-between">
          <div class="col-md-4">
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#contactCreate"><i class="bi bi-plus-circle mx-2"></i><em>Add Contact</em></a>
          </div>
          <div class="col-md-4">
            <form action="{{ route('contact.search') }}" method="GET" class="form-inline d-flex" role="search">
              <input class="form-control me-2" type="search" name="search" placeholder="Search Contact" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-light table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Contact Number</th>
              <th scope="col">Email Address</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contacts as $key=> $contact )
            <tr>
              <th scope="row">{{ ++$key }}</th>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->mobile }}</td>
              <td>{{ $contact->email }}</td>
              <td>
                <a href="javascript:void(0)" class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#contactEdit" onclick="contactEditModal({{ $contact->id }})"><span><i class="bi bi-pencil-square"></i></span></a>
                <a href="{{ route('contact.delete', $contact->id) }}" class="btn btn-danger px-2 py-1"><span><i class="bi bi-trash"></i></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {!! $contacts->links('pagination::bootstrap-5') !!}
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Create Modal -->
<div class="modal fade modal-lg" id="contactCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Contact</h1>
      </div>
      <div class="modal-body">
        <form class="p-3" action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-md-3">
                <label for="name">Name :</label>
              </div>
              <div class="col-md-9">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                @error('name')
                  <p class="text-danger"><em><small>{{ $message }}</small></em></p>
                @enderror
              </div>
            </div>
            <div class="row my-4">
              <div class="col-md-3">
                <label for="name">Phone Number :</label>
              </div>
              <div class="col-md-9">
                <input type="number" name="mobile" class="form-control" placeholder="Phone Number" value="{{ old('mobile') }}" required>
                @error('mobile')
                  <p class="text-danger"><em><small>{{ $message }}</small></em></p>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="name">Email Address :</label>
              </div>
              <div class="col-md-9">
                <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
                @error('email')
                  <p class="text-danger"><em><small>{{ $message }}</small></em></p>
                @enderror
              </div>
            </div>
            <div class="col-md-12 mt-5 d-flex justify-content-end">
              <button type="button" class="btn btn-warning mx-2" data-bs-dismiss="modal">Cancel</button>
              <button type="Submit" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade modal-lg" id="contactEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Contact</h1>
      </div>
      <div class="modal-body" id="contactEditContent">

      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script>
  function contactEditModal(contact_id){
      var data = {
      contact_id: contact_id,
    };

    $.ajax({
      url: "{{ route('contact.edit') }}",
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      type: 'GET',
      dataType: '',
      data: data,
      success: function (response){
        $('#contactEdit').modal('show');
        $('#contactEditContent').html(response);
      }
    });
  }
</script>
@endpush



