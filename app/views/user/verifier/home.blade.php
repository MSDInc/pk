@extends('layout.basic')

@section('content')

<div class="row">
  <div class="col-lg-8 col-md-7 col-sm-6">
    <h2>Verify Books
    </h2>
  </div>
</div>

<hr>

<div class="transaction-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal">
        <fieldset>
          <!--<legend>Verify books</legend> -->
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Username</label>
            <div class="col-lg-10">
              <input class="form-control" for="focusedInput" id="inputEmail" placeholder="Username" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Bookitems</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" id="inputBook" placeholder="Ids"></textarea>
              <span class="help-block">Enter id seperated by a semicolon.</span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary">Verify</button>
              <button type="reset" class="btn btn-default pull-right">Reset</button>
            </div>
          </div>

        </fieldset>
      </form>
    </div>

    <div class="col-lg-4">
    @include ('layout.alertbox')
    </div>

  </div>
</div>

@stop
