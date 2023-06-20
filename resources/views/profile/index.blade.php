@extends('layouts.app')

@section('content')
<style>
  .col-i{
      color:black;
  }
  .cl-i{
      background:#4b4344;
      color:white;    
  }
  .cl-ii{
      color:#4b4344;
  }
</style>
@php
$n = Auth::user();
@endphp

<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="cl-i font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Update Profile
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="/profile/{{$n->id}}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap">
                        <label for="name" class="col-i block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Name : {{$n->name}}
                        </label>

                        <input id="name" type="text" class="form-input w-full"
                            name="name" >

                        
                    </div>
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full my-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            Update
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection