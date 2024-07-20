@extends('layouts.main')
@section('content')
<div id="special" class="tm-page-content">
@foreach ($specialBeverages as $beverage)
            <div class="tm-special-items">
              <div class="tm-black-bg tm-special-item">
                <img src="{{ asset('assets/images/' . $beverage->image) }}" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">{{$beverage->title}}</h2>
                  <p class="tm-special-item-text">{{$beverage->content}}</p>  
                </div>
              </div>
              @endforeach                      
            </div>            
          </div>
          @endsection