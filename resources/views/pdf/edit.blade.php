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
                    action="/pdf/{{$pdf->id}}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap">
                        <label for="name" class="col-i block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Name : {{$pdf->name}}
                        </label>

                        <input id="name" type="text" class="form-input w-full"
                            name="name" value="{{$pdf->name}}">

                        
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Status :
                        </label>
                    <div class="m-auto">
                        <label class="inline-flex items-center ">
                            <input type="radio" class="form-radio" name="manage" value="0">
                                    <span class="ml-2">Hide</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio" name="manage" value="1" checked>
                                <span class="ml-2">Show</span>
                        </label>
                    </div>  
                    </div>
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full my-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            Update
                        </button>
                    </div>

                </form>
                <form action="/pdf/{{$pdf->id}}" method="post" >
                    @csrf
                    @method('delete')
                <div class="flex flex-wrap">
                    <button type="submit"
                        class="w-full my-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-500 hover:bg-red-700 sm:py-4">
                        Delete
                    </button>
                </div>
            </form>
            </section>
        </div>
    </div>
</main>
@endsection