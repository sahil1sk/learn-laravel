@include('partials.header')

<h1>{{$title}}</h1>
<h3>A Simple view File</h3>
@csrf

<script>
    var names = @json($title);
    console.log(names);
</script>