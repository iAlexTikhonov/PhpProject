@extends('layout')


@section('content')

<!-- ##### Blog Post Area Start ##### -->
<div class="viral-story-blog-post section-padding-0-50">
    <div class="container">
        <div class="row">
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
                                    <a href="#" class="post-catagory">Finance</a>
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

            <!-- Sidebar Area -->
            <div class="col-12 col-lg-4">
                <div class="sidebar-area">

                    <!-- Newsletter Widget -->
                    <div class="newsletter-widget mb-70">
                        <h4>Sign up to <br>our newsletter</h4>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="passwordConfirmation" placeholder="Confirm password">
                            <button type="submit" class="btn w-100">Sign up</button>
                        </form>
                    </div>

                    <!-- Trending Articles Widget -->
                    <div class="treading-articles-widget mb-70">
                        <h4>Trending Articles</h4>

                        <!-- Single Trending Articles -->
                        <div class="single-blog-post style-4">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/15.jpg" alt=""></a>
                                <span class="serial-number">01.</span>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>This Is How Notebooks Of An Artist Who Travels Around The World Look</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Trending Articles -->
                        <div class="single-blog-post style-4">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/16.jpg" alt=""></a>
                                <span class="serial-number">02.</span>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Trending Articles -->
                        <div class="single-blog-post style-4">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/17.jpg" alt=""></a>
                                <span class="serial-number">03.</span>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Add Widget -->
                    <div class="add-widget mb-70">
                        <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                    </div>

                    <!-- Latest Comments -->
                    <div class="latest-comments-widget">
                        <h4>Latest Comments</h4>

                        <!-- Single Comment Widget -->
                        <div class="single-comments d-flex">
                            <div class="comments-thumbnail">
                                <img src="img/bg-img/t1.jpg" alt="">
                            </div>
                            <div class="comments-text">
                                <a href="#"><span>Jamie Smith</span> on Facebook is offering facial recognition...</a>
                                <p>06:34 am, April 14, 2018</p>
                            </div>
                        </div>

                        <!-- Single Comment Widget -->
                        <div class="single-comments d-flex">
                            <div class="comments-thumbnail">
                                <img src="img/bg-img/t2.jpg" alt="">
                            </div>
                            <div class="comments-text">
                                <a href="#"><span>Tania Heffner</span> on Facebook is offering facial recognition...</a>
                                <p>06:34 am, April 14, 2018</p>
                            </div>
                        </div>

                        <!-- Single Comment Widget -->
                        <div class="single-comments d-flex">
                            <div class="comments-thumbnail">
                                <img src="img/bg-img/t3.jpg" alt="">
                            </div>
                            <div class="comments-text">
                                <a href="#"><span>Sandy Doe</span> on Facebook is offering facial recognition...</a>
                                <p>06:34 am, April 14, 2018</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Post Area End ##### -->

@endsection