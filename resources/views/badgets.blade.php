@extends('layouts.userLayout')

@section('content')
<div class="container" ng-controller="badgetController">
  <h1> Achievements </h1>

<div class="row">
  <div class="col-md-10">
    <div class="col-md-3 col-md-offset-1" style="display: inline-block; text-align: center;" ng-repeat="badge in badgets">
     <img style="margin-top: 20px;" src="@{{ badge.urlfoto }}">
     <p style="margin-top: 20px;">@{{badge.description}}</p>
     <p style="margin-top: 20px;">Minimum Value Donated: @{{badge.min_value}}€</p> 
     <div class="col-md-6"> 
        <span id="id" style="display:none">{{Auth::user()->id}}</span> 
      </div>
    
   </div>
 </div>
</div>

</div>
@endsection