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

<form action="{{route('dashboard.category.update', $category)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card">
        <div class="container">
            <div class="card-head">
                <h1>{{__('words.addCategory')}}</h1>
            </div>
            <div class="card-bolck">
                <img class="edit_page" src="{{asset($category->image)}}" alt="">
                <input type="file" name="img" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <select name="parent" class="block w-1/2 p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0" >{{__('words.mainContent')}}</option>
                    @foreach($categories as $item)
                        @if($item->id != $category->id)
                        <option value="{{$item->id}}" @if($category->parent == $item->id) selected @endif >{{$item->title}}</option>
                        @endif
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
                                <input value="{{$category->translate($key)->title}}" type="text" name="{{$key}}[title]" placeholder="{{__('words.title')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <input value="{{$category->translate($key)->content}}" type="text" name="{{$key}}[content]" placeholder="{{__('words.content')}}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-md bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 my-5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
        <button class="btn btn-primary" style="color: black;" type="submit">{{__('words.update')}}</button>
    </div>
</form>


@stop
