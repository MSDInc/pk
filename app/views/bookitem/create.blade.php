@extends('layout.basic') @section('content')

<div class="row">
  <div class="col-lg-6">
    <h2>Add a Book Item</h2>
  </div>
</div>

<hr>

<div class="create-form">
  <div class="row">

    <div class="col-lg-8">
      <form class="form-horizontal" method="POST"
        action="{{URL::to('bookitem')}}">
        <fieldset>
          <!-- <legend>Add Books</legend> -->
          <div class="form-group">
            <label for="inputISBN" class="col-lg-4 control-label">
              ISBN</label>
            <!-- Used Input::get('isbn') to get data from get -->
            <div class="col-lg-8">
              <input class="form-control" id="inputISBN"
              value="{{{Input::get('isbn')}}}"
              name="book_isbn" type="text">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEdition" class="col-lg-4 control-label">
              Edition</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputEdition"
              name="edition" type="text">
            </div>
          </div>

          <div class="form-group">
            <label for="inputQty" class="col-lg-4 control-label">
              Quantity</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputQty"
              name="quantity" type="number" min="1">
            </div>
          </div>

         @include ('layout.submitbtn')

        </fieldset>
      </form>
    </div>

    <div class="col-lg-4">
    @include ('layout.alertbox')
    </div>

  </div>
</div>

@stop
