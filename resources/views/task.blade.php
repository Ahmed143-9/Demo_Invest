<h1>Task Page</h1>

@php

$task = ['Kawser Ahmed', 'Asaduzzaman', 'Md. Mahmudul Hasan', 'Md. Shakil Ahmed'];    

@endphp

<ul>
    @foreach ($task as $item)
        <li>{{ $loop->iteration }}-{{ $item }}</li>
    @endforeach
</ul>

@php
$name = trim(fgets(STDIN));
@endphp