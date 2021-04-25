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
    {{-- {{ old("name") }}  Helps to set the old values --}}
    <p>Name: <input type="text" value="{{ old("name") }}" name="name" placeholder="Enter name"></p>
    @error('name')
        <span>{{$message}}</span>
    @enderror
    <p>Email: <input type="email" value="{{ old("email") }}" name="email" placeholder="Enter email"></p>
    <p>Mobile: <input type="number" value="{{ old("mobile") }}" name="mobile" placeholder="Enter mobile"></p>
    <p><button type="submit">Submit</button></p>
</form>
