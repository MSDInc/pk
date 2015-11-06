@extends('layout.basic') @section('content')

<div class="row">
  <div class="col-lg-8 col-md-7 col-sm-6">
    <h2>Issue, Return or Renew Books
    </h2>
  </div>
</div>

<hr>

<div class="transaction-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal" name="actionform"
        method="POST" action="">
        <fieldset>
          <!--<legend>Issue, Renew or Return books</legend> -->
          <div class="form-group">
            <label for="inputUserid" class="col-lg-2 control-label">
              User ID</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputUserid"
              placeholder="User ID" type="text" name="user_id">
            </div>
          </div>

          <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">
              Book Item IDs</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" id="inputBook"
                name="bookitem_ids" placeholder="Ids"></textarea>
              <span class="help-block">
                Enter id seperated by a semicolon.</span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <div class="btn-group">
                <button type="submit" class="btn btn-primary"
                  onClick="submitIssue()">Issue</button>
                <button type="submit" class="btn btn-warning"
                  onClick="submitRenew()">Renew</button>
              </div>
              <button type="submit" class="btn btn-success"
                onClick="submitReturn()">Return</button>
              <button type="reset" sclass="btn btn-default pull-right">Reset</button>
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
<script>

function submitIssue() {
  document.actionform.action = "/action/issue";
  return document.actionform.submit();
}

function submitRenew() {
  document.actionform.action = "/action/renew";
  return document.actionform.submit();
}

function submitReturn() {
  document.actionform.action = "/action/return";
  return document.actionform.submit();
}
</script>

@stop
