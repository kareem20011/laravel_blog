@extends('dashboard.layouts.layout')
@section('admin_content')

<div class="container mx-auto py-5">
    <form class="w-full max-w-lg" method="post" action="{{route('dashboard.setting.update')}}" enctype="multipart/form-data">
        @csrf
        <h1>{{__('words.settings')}}</h1>
        <div class="flex flex-wrap mx-3 mb-6">

            <div class="md:w-1/2 p-3">
                <label for="file_input">{{__('words.logo')}}</label>
                <input name="logo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>

            <div class="md:w-1/2 p-3">
                <label for="file_input">{{__('words.favicon')}}</label>
                <input name="favicon" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>

            <div class="md:w-1/2 p-3">
                <input name="facebook" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.facebook')}}">
            </div>

            <div class="md:w-1/2 p-3">
                <input name="instagram" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.instagram')}}">
            </div>

            <div class="md:w-1/2 p-3">
                <input name="email" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.email')}}">
            </div>

            <div class="md:w-1/2 p-3">
                <input name="phone" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.phone')}}">
            </div>

        </div>

        <h2>Translation</h2>

        <div class="tab">
            @foreach (config('app.languages') as $key=>$lang)
                <button type="button" class="tablinks" onclick="openCity(event, '{{$key}}')">{{$lang}}</button>
            @endforeach

        </div>


        @foreach (config('app.languages') as $key=>$lang)
        <div id="{{$key}}" class="tabcontent @if($loop->index == 0) activex @endif">
            <h1>{{$lang}}</h1>
            <div class="md:w-full p-3">
                <input type="text" name="title" placeholder="{{__('words.title')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="content" placeholder="{{__('words.content')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <input type="text" name="address" placeholder="{{__('words.address')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>
        @endforeach

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Button
        </button>
    </form>
</div>

@stop




