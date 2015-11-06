<div class="panel panel-default">
  <div class="panel-heading">Action</div>

  <div class="panel-body">
    <div class="transaction-form">
      <form class="form-horizontal" name="actionform" method="POST" action="">

        <div class="form-group">
          <div class="col-lg-12">
              <input class="form-control" id="inputUserid"
              placeholder="User ID" type="hidden" name="user_id" value="{{$user->id}}">
            <textarea class="form-control" rows="2" id="inputBook"
             name="bookitem_ids" placeholder="Enter books" autofocus
            style="resize: vertical"></textarea>
            <span class="help-block">Ids seperated by a semicolon.</span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <div class="btn-group">
              <button type="submit" class="btn btn-sm btn-primary" onClick="submitIssue()">Issue</button>
              <button type="submit" class="btn btn-sm btn-warning" onClick="submitRenew()">Renew</button>
            </div>
            <button type="submit" class="btn btn-sm btn-success" onClick="submitReturn()">Return</button>
            <button type="reset" class="btn btn-default btn-sm pull-right">Clear</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
