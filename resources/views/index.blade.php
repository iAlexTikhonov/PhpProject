@extends('layout')


@section('content')
    <!-- Blog Posts Area -->
    <div class="col-12 col-lg-8">
        <div class="row">

            @foreach($posts as $post)
            <!-- Single Blog Post -->
                <div class="col-12 col-lg-6">
                    <div class="single-blog-post style-3">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <a href="#"><img src="{{ $post->image }}" alt=""></a>
                        </div>
                        <!-- Post Data -->
                        <div class="post-data">
                            @foreach($post->categories as $category)
                            <a href="/category/{{ $category->id }}" class="post-catagory">{{ $category->title }}</a>
                            @endforeach
                            <a href="#" class="post-title">
                                <h6>{{ $post->title }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-12">
                <div class="viral-news-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            @if($posts->currentPage() == 1)
                                <li class="page-item"><a class="page-link" href="?page={{ $posts->currentPage() }}">Previous</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="?page={{ $posts->currentPage() - 1 }}">Previous</a></li>
                            @endif

                            @for($i = 1; $i <= $counter; $i++)
                            <li class="page-item"><a class="page-link" href="/?page={{ $i }}">{{ $i }}</a></li>
                            @endfor

                            @if($posts->currentPage() == $counter)
                                <li class="page-item"><a class="page-link" href="?page={{ $posts->currentPage() }}">Next</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="?page={{ $posts->currentPage() + 1 }}">Next</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('hp-form')
    @include('blocks.registration-hp-form')
@endsection