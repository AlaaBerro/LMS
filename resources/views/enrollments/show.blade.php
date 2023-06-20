@extends('layouts.app')

@section('content')


<div><h1 class="font-bold text-xl text-gray-500  mx-5 my-5">Requests from users : </h1></div>

@foreach($request as $key => $r)
   @if($r->status == 1)

<div class="container flex items-center m-5 border-1 border-gray-900  p-3 bg-blue-100 rounded">
       

       <div class=" text-gray-900 font-bold h-7 px-5 py-2 mr-5  w-full">   
              <p class="">Request {{$key + 1 }} : User id : {{$r->user_id}}</p>
             </div>

        
                <div class="button-container text-gray-100"> 
                        <form class="w-full " method="POST"
                                action="/enrollments/{{$r->id}}">
                                @csrf
                                @method('PUT')
                        <button type="submit" class="bg-green-500 hover:bg-green-700 h-7 px-5 py-2  ">
                                <p class="text-l  font-bold">Accept</p>
                                <input type="hidden" name="status" value="2" />
                        </button>
                        </form>
                </div>

                <div class="button-container text-gray-100 "> 
                        <form class="w-full px-6  " method="POST"
                                action="/enrollments/{{$r->id}}">
                                @csrf
                                @method('delete')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 h-7  px-5 py-2  ">
                                <p class="text-l  font-bold ">Reject</p>
                                <input type="hidden" name="status" value="2" />
                        </button>
                        </form>
                 </div>
</div>

<div class="border-l-2 border-gray-900  m-5"></div>



@endif
@endforeach   


<div><h1 class="font-bold text-xl text-gray-500  mx-5 my-5">Users enrolled in your course : </h1></div>


@foreach($request as $key => $r)
  @if($r->status == 2 && $r->user_id != Auth::user()->id)

        <div class="container flex items-center m-5 border-1 border-gray-900  p-3 bg-blue-100 rounded">
         
             <div class=" text-gray-900 font-bold h-7 mr-5 px-5 py-2 w-full">   
              <p class="">User id : {{$r->user_id}}</p>
             </div>
                        <div class="button-container bg-gray-100 "> 
                                <form class="" method="POST"
                                        action="/enrollments/{{$r->id}}">
                                        @csrf
                                        @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 h-7  px-5 py-2">
                                        <p class="text-l text-gray-100 font-bold ">Remove</p>
                                </button>
                                </form>
                         </div>
        </div>

 @endif
@endforeach   

@endsection