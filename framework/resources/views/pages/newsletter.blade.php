@extends('layouts.default')
@section('title', Lang::get('messages.contact_title'))

@section('metadescription',Lang::get('messages.contact_meta'))
@section('keywords', '')

@section('og_title', '')
@section('og_image', '')
@section('og_description', '')

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-justify">
			<h1>Newsletter</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Nunc odio sem, lobortis id molestie non, faucibus quis nibh.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc odio sem, lobortis id molestie non, faucibus quis nibh.</p>
		</div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h2>Register</h2>
      <form class="form-horizontal">
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" placeholder="Name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Receive special offers and notificaiones
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>
                <input type="checkbox"> I accept the terms and conditions
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
    </div>
	</div>
</div>
@stop
