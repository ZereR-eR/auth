@extends("layouts.app")
@section("title")
    Create Category
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-6">
                <form action="{{ route("category.store") }}" class="mb-4" method="post">
                    @csrf
                    <div class="">
                        <div class="">
                            <label for="" class="form-label h4">Title</label>
                            <input type="text" autofocus name="title" class="form-control @error("title") is-invalid @enderror">
                            @error("title") <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button class="btn btn-dark mt-3">
                            Create
                        </button>
                    </div>
                </form>
                @include("category.list")
            </div>
        </div>
    </div>
@endsection
