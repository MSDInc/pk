@extends('layout.basic') @section('content')

<div class="row">
  <div class="col-lg-6">
    @if ($forupdate)
    <h2>Edit {{$type}}</h2>
    @else
    <h2>Add {{$type}}</h2>
    @endif
  </div>
</div>

<hr>
<div class="contact-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal" method="POST"
        @if ($forupdate)
        action="{{URL::to('user').'/'.$user->id}}"
        @else
        action="{{URL::to('user')}}"
        @endif
        >

        <fieldset>
          @if ($forupdate)
          <input type="hidden" name="_method" value="put">
          @else
          <input type="hidden" name="role_name" value="{{$type}}">
          @endif

          <div class="form-group">
            <label for="inputName"
              class="col-lg-4 control-label">Name</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputName"
              name="name" type="text" required
              @if ($forupdate)
              value="{{$user->name}}"
              @else
              value="{{Input::old('name')}}"
              @endif
              >
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail"
              class="col-lg-4 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputEmail"
              name="email" type="email" required
              @if ($forupdate)
              value="{{$user->email}}"
              @else
              value="{{Input::old('email')}}"
              @endif
            >
            </div>
          </div>

          <div class="form-group">
            <label for="inputAddress"
              class="col-lg-4 control-label">Address</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputAddress"
              name="address" type="text" required
              @if ($forupdate)
              value="{{$user->address}}"
              @else
              value="{{Input::old('address')}}"
              @endif
            >
          </div>
        </div>
          <div class="form-group">
            <label for="inputContact"
              class="col-lg-4 control-label">Phone</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputContact"
              name="phone" type="tel" required
              @if ($forupdate)
              value="{{$user->phone}}"
              @else
              value="{{Input::old('phone')}}"
              @endif
              >
            </div>
          </div>

          @if ($type=="Student")
          <div class="form-group">
            <label for="inputRoll"
              class="col-lg-4 control-label">RollNumber</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputRoll"
              name="rollnumber" type="number" min="0"
              @if ($forupdate)
              value="{{$userinfo->rollnumber}}"
              @else
              value="{{Input::old('rollnumber')}}"
              @endif
                 required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputDepart"
              class="col-lg-4 control-label">Department</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputDepart"
              name="department_sname" type="text"
              @if ($forupdate)
              value="{{$userinfo->department_sname}}"
              @else
              value="{{Input::old('department_sname')}}"
              @endif
              required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputBatch"
              class="col-lg-4 control-label">Batch</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputBatch"
              name="batch" type="text"
              @if ($forupdate)
              value="{{$userinfo->batch}}"
              @else
              value="{{Input::old('batch')}}"
              @endif
              required>
            </div>
          </div>
          @endif

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
