@extends('template_blog.main')

@section('title')
    Garut News 24
@endsection

@section('content')
    
<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height"><img src="{{ asset('public/images/nick-karvounis-78711.jpg') }}" alt="img"/>
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Dec 31,2017
                    </a></div>
                    <div class=""><a href="single.html" class="fh5co_good_font"> After all is said and done, more is said than done </a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('public/blog_frontend/images/science-578x362.jpg') }}" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Oct
                                28,2017 </a></div>
                            <div class=""><a href="single.html" class="fh5co_good_font_2"> After all is said and done, <br>more is said than done </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Berita Terbaru </div>
                </div>
                @foreach ($posts as $result =>$post)
                    
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{ $post->image }}" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="{{ route('blog.read', $post->slug) }}" class="fh5co_magna py-2">{{ $post->title }}</a>
                        <br> 
                        <a href="single.html" class="fh5co_mini_time py-3"> {{ $post->users->name }} -
                        {{ $post->created_at->diffForHumans() }} </a>
                        <div class="fh5co_consectetur">{!! \Illuminate\Support\Str::limit($post->content, 150) !!}</div>
                    </div>
                </div>
                @endforeach
            </div>
            @include('template_blog.right_bar')
        </div>
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="{{ route('list.post') }}" class="btn btn-primary">Berita selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection