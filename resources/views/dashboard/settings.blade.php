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

<div class="container mx-auto py-5">
    @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            <span class="font-medium">{{__('words.success')}}</span>
        </div>
    @endif

    <form class="setting_form w-full max-w-lg" method="post" action="{{route('dashboard.setting.update', $settings)}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h1>{{__('words.settings')}}</h1>
            </div>
            <div class="card-block">
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="md:w-1/2 p-3">
                        <label for="logo">{{__('words.logo')}}</label>
                        @if(empty($settings->logo))
                        <img src="{{asset('adminAssets/img/notfound.png')}}" alt="">
                        @elseif($settings->logo)
                        <img src="{{asset($settings->logo)}}" alt="...">

                        @endif
                        <input name="logo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </div>

                    <div class="md:w-1/2 p-3">
                        <label for="favicon">{{__('words.favicon')}}</label>
                        @if(empty($settings->favicon))
                        <img src="{{asset('adminAssets/img/notfound.png')}}" alt="">
                        @elseif($settings->favicon)
                        <img src="{{asset($settings->favicon)}}" alt="...">

                        @endif
                        <input name="favicon" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </div>

                    <div class="md:w-1/2 p-3">
                        <input value="{{$settings->facebook}}" name="facebook" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.facebook')}}">
                    </div>

                    <div class="md:w-1/2 p-3">
                        <input value="{{$settings->instagram}}" name="instagram" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.instagram')}}">
                    </div>

                    <div class="md:w-1/2 p-3">
                        <input value="{{$settings->email}}" name="email" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.email')}}">
                    </div>

                    <div class="md:w-1/2 p-3">
                        <input value="{{$settings->phone}}" name="phone" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="{{__('words.phone')}}">
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h1>{{__('words.translation')}}</h1>
            </div>
            <div class="card-bolck">
                <div class="tab">
                    @foreach (config('app.languages') as $key=>$lang)
                        <button type="button" class="tablinks" onclick="openCity(event, '{{$key}}')">{{$lang}}</button>
                    @endforeach
                </div>
                @foreach (config('app.languages') as $key=>$lang)
                    <div id="{{$key}}" class="tabcontent @if($loop->index == 0) activex @endif">
                        <div class="md:w-full p-3">
                            <input value="{{$settings->translate($key)->title}}" type="text" name="{{$key}}[title]" placeholder="{{__('words.title')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <input value="{{$settings->translate($key)->content}}" type="text" name="{{$key}}[content]" placeholder="{{__('words.content')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <input value="{{$settings->translate($key)->address}}" type="text" name="{{$key}}[address]" placeholder="{{__('words.address')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
    </form>
</div>

@stop




