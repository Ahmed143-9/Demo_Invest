{{-- @php
$name = ["one" => "Kawser Ahmed Sajal", "two" => "Asaduzzaman Asad", "three" => "Shahid sahan"];    
@endphp --}}
@php
$name = ["Kawser Ahmed Sajal", "Asaduzzaman Asad", "Shahid sahan"];    
@endphp
{{-- @includeUnless(empty($name), 'common', ['name' => $name]) --}}

{{ $name }}
{{-- @foreach
{{ $name }}
@endforeach --}}
{{-- @includeWhen(!empty($name), 'common', ['name' => $name]) --}}


{{-- @includeIf('common', ['name' => $name]) --}}
<h1>Home Page</h1>

