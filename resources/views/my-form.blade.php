<h1>Please fill the form</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="submit-data" method="POST">
    @csrf
    <p>Name: <input type="text" name="name" placeholder="Enter name"></p>
    @error('name')
        <span>{{$message}}</span>
    @enderror
    <p>Email: <input type="email" name="email" placeholder="Enter email"></p>
    <p>Mobile: <input type="number" name="mobile" placeholder="Enter mobile"></p>
    <p><button type="submit">Submit</button></p>
</form>
