    <div class="panel panel-default">
      <div class="panel-heading">Action</div>

      <div class="panel-body">
        <div class="transaction-form">
          <form class="form-horizontal" name="actionform" method="POST" action="">
              <div class="form-group">
                <div class="col-lg-12">
                  <textarea class="form-control" rows="2" id="inputBook" name="bookitem_ids" placeholder="Enter books" autofocus></textarea>
                  <span class="help-block">Ids seperated by a semicolon.</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <div class="btn-group">
                    <button type="submit" class="btn btn-sm btn-primary" onClick="submitVerify()">Verify</button>
                  </div>
                  <button type="reset" class="btn btn-default btn-sm pull-right">Clear</button>
                </div>
              </div>
          </form>

        </div>
      </div>
    </div>
 
