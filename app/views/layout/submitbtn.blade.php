<div class="form-group">
  <div class="col-lg-8 col-lg-offset-4">
    <div class="btn-group pull-right">
      <button type="submit" class="btn btn-primary">
      @if (isset($forupdate))
      @if ( $forupdate )
            <span class="glyphicon glyphicon-ok"> </span>
            Save
        @else
            <span class="glyphicon glyphicon-plus"> </span>
            Add
        @endif
      @else
            <span class="glyphicon glyphicon-ok"> </span>
            Ok
      @endif
      </button>
      <a class="btn btn-default" href="#">
            <span class="glyphicon glyphicon-remove"> </span>
            Close
     </a>
    </div>
  </div>
</div>
