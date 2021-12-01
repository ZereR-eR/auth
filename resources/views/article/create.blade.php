@extends("layouts.app")
@section("title")
    Create Article
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-6">
                <h4 class="mb-4">Create Article</h4>
                <form action="{{ route("article.store") }}" class="mb-4" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" autofocus name="title" class="form-control @error("name") is-invalid @enderror">
                        @error("name") <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select id="" name="category_id" class="form-control">
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error("title") <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Upload Photo</label>
                        <input type="file" multiple name="photo[]" accept="image/jpeg" class="form-control mb-4">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control @error("description") is-invalid @enderror" name="description" id="" cols="30" rows="10"></textarea>
                        @error("description") <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button class="btn btn-lg btn-dark">
                        Create Article
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
