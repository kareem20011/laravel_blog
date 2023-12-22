@extends('dashboard.layouts.layout')
@section('admin_content')
<form action="{{route('dashboard.users.update', $user)}}" method="post">
    @method('PUT')
    @csrf
    <div class="card">
        <div class="card-head">
            <h1>{{__('words.users')}}</h1>
        </div>
        <div class="card-bolck">
            <div class="md:w-full p-3">
                <input value="{{$user->name}}" type="text" placeholder="{{__('words.name')}}" name="name" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input value="{{$user->email}}" type="text" placeholder="{{__('words.email')}}" name="email" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @can('viewAny', $user)
                <select name="status" class="form-control w-1/2">
                    <option value="admin" @if($user->status == 'admin') selected @endif > {{__('words.admin')}}</option>
                    <option value="writer" @if($user->status == 'writer') selected @endif > {{__('words.writer')}}</option>
                    <option value="null" @if($user->status == '') selected @endif > {{__('words.notActive')}}</option>

                </select>
                @endcan
            </div>
        </div>
        <button class="btn btn-primary" style="color: black;" type="submit">{{__('words.update')}}</button>
    </div>
</form>
@stop
