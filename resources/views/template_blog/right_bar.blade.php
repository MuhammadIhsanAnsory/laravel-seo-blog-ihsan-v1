<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all">
        <a href="#" class="fh5co_tagg">Business</a>
        <a href="#" class="fh5co_tagg">Technology</a>
        <a href="#" class="fh5co_tagg">Sport</a>
        <a href="#" class="fh5co_tagg">Art</a>
        <a href="#" class="fh5co_tagg">Lifestyle</a>
        <a href="#" class="fh5co_tagg">Three</a>
        <a href="#" class="fh5co_tagg">Photography</a>
        <a href="#" class="fh5co_tagg">Lifestyle</a>
        <a href="#" class="fh5co_tagg">Art</a>
        <a href="#" class="fh5co_tagg">Education</a>
        <a href="#" class="fh5co_tagg">Social</a>
        <a href="#" class="fh5co_tagg">Three</a>
    </div>
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Kategori</div>
    </div>
    <div class="row pb-3">
        <div class="col-7 paddding">
            <ul>
                @foreach ($categories as $category)
                <li><a href="{{ route('blog.category', $category->slug) }}" class="fh5co_mini_time py-2">{{ $category->name }}      (<span>{{ $category->posts->count() }})</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>