@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as ADMIN!
                    <br>
                    @foreach($offers as $offer)
                      {{$offer['id']}}
                      {{$offer['name']}}
                      <form id="approve-offer" method="post" action="{{ action('OfferController@update', $offer['id'] )}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="status" class="form-control input-lg" value="1">
                        <input type="hidden" name="name" class="form-control input-lg" value="{{$offer->name}}">
                        <input type="hidden" name="offerprice" class="form-control input-lg" value="{{$offer->offerprice}}">
                        <input type="hidden" name="comments" class="form-control input-lg" value="{{$offer->comments}}">
                        <button class="btn btn-success" type="submit">Approve</button>
                      </form>

                      <form id="delete-offer" action="{{action('OfferController@destroy', $offer['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="delete">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this offer?')">
                          Delete
                        </button>
                      </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
