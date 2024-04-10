<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.front.head')
<body>
    @include('layouts.front.header')
    <main class="mt-6 flex justify-between mt-6">
            @if(count($posts) > 0)
            <div class="card-body grid gap-4 mt-6">
                    @foreach($posts as $post)
                        <div class="bg-white p-4 rounded-md shadow-md " style="width: 600px; height: 200px;"> 
                            <h2 class="text-xl font-semibold mb-2 text-black">{{ $post->title }}</h2>
                            <p class="text-black">{{ $post->content }}</p> 
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-red-500">Aucun post trouvé.</p>
            @endif
        </div>
    </main>
    @include('layouts.front.footer')
    <div class="flex justify-between mt-6">
        <a href="legals" class="text-blue-500">Mentions légales</a>
        <a href="about" class="text-blue-500">À Propos</a>
    </div>
</body>
</html>
