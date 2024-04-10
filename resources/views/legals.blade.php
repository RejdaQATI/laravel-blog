

@include('layouts.front.head')



@include('layouts.front.header') 
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

    {!! $title !!}
    
    {!! $content !!}

<ul>
    @if(count($items) > 0)
        @foreach($items as $item)
        <li>{{ $item }}</li>
        @endforeach
    @else
        <p>Ca marche pas</p>
    @endif
</ul>
@include('layouts.front.footer')