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
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="cl-i font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    New Course
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="/course">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="col-i block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text" class="form-input w-full"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        
                    </div>

                    <div class="flex flex-wrap">
                        <label for="title" class="col-i block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Title:
                        </label>

                        <input id="title" type="text"
                            class="form-input w-full " name="title">
                    </div>

                    <div class="flex flex-wrap">
                        <label for="description" class="col-i block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Description:
                        </label>

                        <textarea id="description" type="text"
                            class="form-input w-full " name="description">
                        </textarea>
                    </div>

                  

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="cl-i w-full my-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            Create
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection