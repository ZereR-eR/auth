@extends("layouts.app")
@section("title")
    Article List
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mt-5">
                <h3 class="text-center mb-4">Article List</h3>
                @foreach($articles as $article)
                    <div class="card mb-3">
                        <div class="card-body text-dark">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4>{{ $article->title }}</h4>
                                <small class="badge bg-secondary">{{ $article->category->title }}</small>
                            </div>
                            <p>{{ \Illuminate\Support\Str::words($article->description,20) }}</p>
                            <div class="">
                                <a href="{{ route("article.show",$article->id) }}" class="btn btn-outline-dark">See More</a>
                                <a href="{{ route("article.edit",$article->id) }}" class="btn btn-outline-secondary">Edit</a>
                                <form action="{{ route("article.destroy",$article->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-outline-danger">Del</button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
