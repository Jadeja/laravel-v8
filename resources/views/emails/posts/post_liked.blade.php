@component('mail::message')
# Introduction

{{$liker->name}} has liked your post.

@component('mail::button', ['url' => {{ route('posts.liked') }} ])
Show Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
