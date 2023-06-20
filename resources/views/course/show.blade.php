@extends('layouts.app')

@section('content')
<style>
.flex-container {
  display: flex;
  flex-direction: row;
  flex-wrap:wrap;
  justify-content:space-around;
  height:700px;
  margin:20px;
  
  
}
.div1{
  flex-basis: 24%;
  height:30%;
  background:white;
  color:white;
  
}
.div1{
            display:flex;
            flex-direction: column;
            flex-wrap:wrap;
            
            width:30%;
            
            justify-content:center;
            align-items:center;
            position:relative;
            overflow:hidden;
            border-radius:16px;
            
        }
        .div1::before{
            content:'';
            position:absolute;
            
            width:15%;
            height:300%;
            /*background:linear-gradient(red,blue);
            animation:animate 4s linear infinite;*/
         }
         .div1::after{
            content:'';
            position:absolute;
            background:white;
            border-radius:16px;
            inset:4px;
         }
         @keyframes animate
         {
            0%{
                transform: rotate(0deg);
            
            }
            100%{
                transform: rotate(360deg);
            
            }
         }
.description{
  height:45%;
  color:#4b4344;
  padding:5%;
  
  position:relative;
  z-index:10;
}
.addco{
  text-align:center;
}
.add-co{
  font:bold;
}
.mm-b{
  text-align:center;
  position:relative;
  z-index:10;
  /*height:30%;*/
  height:25%;
  width:98%;
  background:#4b4344;
  border-radius:16px;
  margin: 1px;
  
  
}
.button-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
}

.my-button {
  background-color: #4b4344; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:30px;
}
.button-wrapper {
  position: fixed;
  bottom: 0;
  left: 0;
  padding: 20px;
}

button {
    background-color: #4b4344; 
  color: white;
  padding: 15px 32px;
  border: none;
  margin: 4px 2px;
  border-radius: 4px;
  cursor: pointer;
  border-radius:30px;
}
.bb {
  position: fixed;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.button {
  background-color:  #4b4344; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 25px 5px;
  cursor: pointer;
}
</style>
@php
     $cid = session()->put('my_data', $course->id);
@endphp

<div class="flex-container"> 
@if(isset($enrolls) && $enrolls->status == 2)
    @foreach($pdfs as $pdf)
        @if($pdf->cid == $course->id && ($pdf->status == 1 ||  $course->editor_id == Auth::user()->id))

              <div class="div1"><div class="description">{{$pdf->name}} </div>
              <div class="mm-b"><a href="{{ route('pdf.show', $pdf->id) }}"><p class="mt-2">download</p></a></div>
                    @if(Auth::user()->id  == $course->editor_id)
                          <div class="mm-b"><a href="/pdf/{{$pdf->id}}/edit"><p class="mt-2">manage</p></a></div>
              
                    @endif

              </div>
          @endif
      @endforeach
      @else 
      <div class="mx-auto text-xl font-bold"><h1>Please enroll to the course to see the concept and wait for the acceptance.</h1></div>
@endif

 @if(auth()->check() && auth()->user()->id === $course->editor_id)
<a href="/pdf/create">
  <div class="button-container">
  
  <button class="my-button">+ uplaod pdf</button>
</div></a>

</div> 

<a href="/course/{{$course->id}}/edit">
<div class="button-wrapper">
  <button>manage course</button>
</div>

</a>

<body>
  <a href="/enrollments/{{$course->id}}">
    <div class="bb"> 
        <button class="button">
            See Requests
          </button>
    </div>
  </a>
@endif
@if( $buttonVisible )
                <form method="POST" action="/enrollments">
                  @csrf
                  <div class="button-container"> 
                    <input type="hidden" name="st" value="{{$course->id}}" />
                    <button type="submit" class="my-button">
                      Enroll 
                    </button>
              </div>
                </form>
            @endif
@endsection
