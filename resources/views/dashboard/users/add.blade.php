@extends('dashboard.layouts.layout')
@section('admin_content')

@if ($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('dashboard.users.store')}}" method="post">
    @csrf
    @method('post')
    <div class="card">
    @if(session()->has('success'))
    <div class="alert alert-success text-center" role="alert">
      <span class="font-medium">{{__('words.success')}}</span>
    </div>
    @endif
        <div class="container">
        <div class="card-head">
            <h1>{{__('words.addUsers')}}</h1>
        </div>
        <div class="card-bolck">
            <input type="text" placeholder="{{__('words.name')}}" name="name" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <input type="email" placeholder="{{__('words.email')}}" name="email" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <input type="password" placeholder="{{__('words.password')}}" name="password" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <select name="status" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="null" >{{__('words.notActive')}}</option>
                <option value="admin" > {{__('words.admin')}}</option>
                <option value="writer" > {{__('words.writer')}}</option>

            </select>
        </div>
        </div>
        <button class="btn btn-primary" style="color: black;" type="submit">{{__('words.addUsers')}}</button>
    </div>
</form>


@stop
