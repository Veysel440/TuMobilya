<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>Blog | TuMobilya</title>
    <style>
        .blog-entry {
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .blog-entry img {
            max-width: 50%;
            max-width: 50%;
            height: auto;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-right: auto;
        }

        .blog-entry h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .blog-entry p {
            font-size: 1rem;
            color: #555;
            text-align: justify;
        }

        .announcement-entry {
            text-align: center;
            padding: 15px;
        }

        .announcement-img img.announcement-image {
            max-width: 50%;
            max-width: 50%;
            max-height: 150px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

@include('partials.navbar')

<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h2 style="color: white;">{{ $menus[5]->page_title }}</h2>
                    <p class="mb-4">{{ $menus[5]->page_description }}</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid" alt="Blog Hero Image - Couch">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Son Yazılar</h2>
            </div>
        </div>

        <div class="row">
            @foreach($blogPosts as $post)
                <div class="col-12 col-md-12 col-lg-12 mb-5">
                    <div class="blog-entry">
                        <!-- Fotoğraf -->
                        <img src="{{ asset('storage/blog_images/' . $post->image) }}" alt="Blog Image" class="img-fluid">

                        <!-- Başlık -->
                        <h3>{{ $post->title }}</h3>

                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="announcements-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Duyurular</h2>
            </div>
        </div>

        <div class="row">
            @if($announcements->isEmpty())
                <p>Duyuru bulunmamaktadır.</p>
            @else
                @foreach($announcements as $announcement)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="announcement-entry">
                            <div class="announcement-img">
                                <img src="{{ asset($announcement->image) }}" alt="Announcement Image" class="img-fluid announcement-image" />
                            </div>
                            <h3>{{ $announcement->title }}</h3>
                            <p>{{ $announcement->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@include('partials.footer')
@include('partials.scripts')

</body>
</html>
