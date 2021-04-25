@extends('layouts.app')

@section('title', "About Us Page")

@section('content')
    <h1>Welcome to About us page.</h1>
    <h3><x-message type="Error" message="Sample error message" :page="$page" /></h3>
    
    <x-alert>
        <x-slot name="title">About Page</x-slot>
        This is another aboutus Page.
    </x-alert>

    <!--Inline components-->
    <x-message-box name="Message Box">
        <x-slot name="title">About Page</x-slot>
        About Page Slot Data is there
    </x-message-box>
@endsection
