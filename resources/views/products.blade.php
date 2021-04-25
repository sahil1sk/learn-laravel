@extends('layouts.app')

@section('title', "Products Page")

@section('content')
    <h1>Welcome to Product Page.</h1>
    <h3><x-message type="Success" message="Sample success message" :page="$page"/></h3>
    
    <x-alert>
        <x-slot name="title">Product Page</x-slot>
        We have some data
    </x-alert>

    <!--Inline components-->
    <x-message-box name="Message Box">
        <x-slot name="title">Product Page</x-slot>
        Product Page Slot Data is there
    </x-message-box>
@endsection
