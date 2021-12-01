@extends("layouts.app")
@section("title")
    Update Category
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-6">
                <form action="{{ route("category.update",$category->id) }}" class="mb-4" method="post">
                    @csrf
                    @method("put")
                        <div class="">
                            <label for="" class="form-label h4">Title</label>
                            <input type="text" autofocus name="title" class="form-control @error("title") is-invalid @enderror" value="{{ old("title",$category->title) }}">
                            @error("title") <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button class="btn btn-secondary mt-3">
                            Update
                        </button>
                </form>
                @include("category.list")
            </div>
        </div>
    </div>
@endsection
