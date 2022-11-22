@extends('admin.layouts.main')

@section('title', 'profile')
    

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="box box-inverse bg-img"  data-overlay="2">
          <div class="flexbox px-20 pt-20">
            <div class="ml-auto">
              <a class="btn btn-rounded btn-success mb-5" href="{{route('admin.profile.edit')}}">Edit Profile</a>
            </div>
          </div>
          <div class="box-body text-center pb-50">
            <a href="#">
            <img class="avatar avatar-xxl avatar-bordered" src="{{asset('assets/admin/images/avatar/5.jpg')}}" alt="">
            </a>
            <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{auth('admin')->user()->name}}</a></h4>
            <span><i class="fa fa-map-marker w-20"></i> Miami</span>
          </div>
          <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
            <li>
                <span class="opacity-60">Email</span><br>
                <span class="font-size-20">{{auth('admin')->user()->email}}</span>
            </li>
            <li>
                <span class="opacity-60">name</span><br>
                <span class="font-size-20">{{auth('admin')->user()->name}}</span>
            </li>
            <li>
                <span class="opacity-60">username</span><br>
                <span class="font-size-20">{{auth('admin')->user()->username}}</span>
            </li>
          </ul>
      </div>
    </div>
  </div>
@endsection
