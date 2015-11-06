@extends('layout.basic')
@section('content')

<div class="row">
  <div class="col-lg-6">
    <h2>
    @if ($forupdate)
    Edit a book
    @else
    Add a Book
    @endif
    </h2>
  </div>
</div>
<hr>
<div class="create-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal" method="POST"
        @if ($forupdate)
        action="{{URL::to('/book').'/'.$book->isbn}}"
        @else
        action="{{URL::to('/book')}}"
        @endif
        >
        @if ($forupdate)
        <input type="hidden" name="_method" value="put">
        @endif

        <fieldset>
          <!--<legend>Add New Book</legend> -->
          <div class="form-group">
            <label for="inputISBN"
              class="col-lg-4 control-label">ISBN</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputISBN"
              name="isbn" type="text" required
              value="{{$book->isbn}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle"
              class="col-lg-4 control-label">Title</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputTitle"
              name="name" type="text" required
              value="{{$book->name}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAuthor"
              class="col-lg-4 control-label">Author</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputAuthor"
              name="author" type="text" required
              value="{{$book->author}}">
            </div>
          </div>

          <!-- the publisher data is under book unlike the ones listed
            below, we may need to change the publiser if there was a typo
            or misunderstanding during entry -->
          <div class="form-group">
            <label for="inputPublisher"
              class="col-lg-4 control-label">Publisher</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputPublisher"
              name="publisher" type="text" required
              value="{{$book->publisher}}">
            </div>
          </div>

          @if (!$forupdate)
          <div class="form-group">
            <label for="inputEdition" class="col-lg-4 control-label">Edition</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputEdition" name="edition" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputQty" class="col-lg-4 control-label">Quantity</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputQty" name="quantity" type="number" min="0">
            </div>
          </div>
          @endif

          <div class="form-group">
            <label for="inputType" class="col-lg-4 control-label">
              Type</label>
            <div class="col-lg-8">
              <select class="selectpicker" data-width="auto" id="inputType" name="type_name">
                <option>Lendable</option>
                <option>Reference</option>
                <option>NonLendable</option>
              </select>
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
