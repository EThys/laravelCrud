

<form action="{{route('posts.update', $post->id)}}" method="POST"></form>
@csrf
@method('PUT')
