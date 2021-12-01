@extends("master")
@section("title")
    Photo Upload
@endsection

@section("content")
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-lg-4">
                <h4 class="mb-4">Upload Photo</h4>
                <form action="{{ route("photo.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" multiple name="photo[]" accept="image/jpeg" class="form-control mb-4">
                    <button class="btn btn-secondary">Upload</button>
                </form>
                <div class="my-5">
                    <img src="{{ asset("storage/images/61a5d7ac61e09_photo.png") }}" alt="" class="w-50">
                </div>
            </div>
        </div>
    </div>
@stop
