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
            background:linear-gradient(red,blue);
            animation:animate 4s linear infinite;
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
  height:80%;
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
  height:18%;
  width:98%;
  background:#4b4344;
  border-radius:16px;
  
  
}
.button-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
}

.my-button {
  background-color: #4b4344;; 
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

</style>

<div class="flex-container"> 
  @foreach ($courses as $course) 
  
  <div class="div1"><div class="description">{{$course->description}}</div>
  <div class="mm-b"><a href="/course/{{$course->id}}"><p class="mt-2">{{$course->name}}</p></a></div>
</div>
  
@endforeach
</div> 

<a href="/course/create"><div class="button-container">
  <button class="my-button">+ add course</button>
</div></a>


@endsection