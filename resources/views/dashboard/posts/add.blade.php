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

<form action="{{route('dashboard.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <div class="card">
    @if(session()->has('success'))
    <div class="alert alert-success text-center" role="alert">
      <span class="font-medium">{{__('words.success')}}</span>
    </div>
    @endif
        <div class="container">
            <div class="card-head">
                <h1>{{__('words.addPost')}}</h1>
            </div>
            <div class="card-bolck">
                <input type="file" name="image" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <select name="category_id" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" >{{$category->title}}</option>
                    @endforeach
                </select>
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
                                <input placeholder="{{__('words.tags')}}" type="text" name="{{$key}}[tags]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label for="editor">{{__('words.content')}}</label>
                                <textarea value="{{$settings->translate($key)->content}}" id="editor" name="{{$key}}[content]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                <label for="editor">{{__('words.smallDesc')}}</label>
                                <textarea value="{{$settings->translate($key)->smallDesc}}" id="editor" name="{{$key}}[smallDesc]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
        <button class="btn btn-primary" style="color: black;" type="submit">{{__('words.addPost')}}</button>
    </div>
</form>

@stop
