@empty($items)
@else
    <nav>
        <ul @isset($class) class="{{$class}}" @endisset>
            @foreach($items as $item)
                <li>@component('layouts.components.menu-item', $item) {{$item['text']}} @endcomponent</li>
            @endforeach
        </ul>
    </nav>
@endempty
