<?php

namespace App\Services;

use App\Models\BlogPost;

class BlogPostService
{
    protected ImageUploader $uploader;

    public function __construct(ImageUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function create(array $data): BlogPost
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploader->upload($data['image'], 'blog_images');
        }

        return BlogPost::create($data);
    }

    public function update(BlogPost $blog, array $data): void
    {
        if (isset($data['image'])) {
            $this->uploader->delete('blog_images/' . $blog->image);
            $data['image'] = $this->uploader->upload($data['image'], 'blog_images');
        }

        $blog->update($data);
    }

    public function delete(BlogPost $blog): void
    {
        $this->uploader->delete('blog_images/' . $blog->image);
        $blog->delete();
    }
}
