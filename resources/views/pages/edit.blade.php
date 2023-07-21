<form class="p-3" action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-3">
        <label for="name">Name :</label>
      </div>
      <div class="col-md-9">
        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $contact->name }}">
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-3">
        <label for="name">Phone Number :</label>
      </div>
      <div class="col-md-9">
        <input type="number" name="mobile" class="form-control" placeholder="Phone Number" value="{{ $contact->mobile }}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <label for="name">Email Address :</label>
      </div>
      <div class="col-md-9">
        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ $contact->email }}">
      </div>
    </div>
    <div class="col-md-12 mt-5 d-flex justify-content-end">
      <button type="button" class="btn btn-warning mx-2" data-bs-dismiss="modal">Cancel</button>
      <button type="Submit" class="btn btn-success">Update</button>
    </div>
</form>
