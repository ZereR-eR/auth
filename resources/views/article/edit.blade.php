@extends("layouts.app")
@section("title")
    Update Article
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-6">
                <h4 class="mb-4">Update Article</h4>
                <form action="{{ route("article.update",$article->id) }}" class="mb-4" method="post">
                    @csrf
                    @method("put")
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" autofocus name="title" class="form-control @error("name") is-invalid @enderror" value="{{ old("name",$article->name) }}">
                        @error("name") <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select id="" name="category_id" class="form-control">
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $article->category->id ? "selected" : "" }} >
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error("title") <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control @error("description") is-invalid @enderror" name="description" id="" cols="30" rows="10">{{ old("description",$article->description) }}</textarea>
                        @error("description") <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button class="btn btn-lg btn-secondary">
                        Update Article
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
