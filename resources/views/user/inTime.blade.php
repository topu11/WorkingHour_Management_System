@extends('user.master')
@section('title')
    In Time
@endsection
@section('content')
<form class="form-horizontal" id="myForm" action="{{route('store')}}" method="POST">
    {{ @csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name"  value="{{ Auth::user()->name}} " readonly="readonly" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Eamil:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="name" name="email"  value="{{ Auth::user()->email }} " readonly="readonly" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="date">Date:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="date" name="date" readonly="readonly" equired>
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2" for="In_time">In_time:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="time" name="in_at" readonly="readonly" required>
          </div>
        </div>
        {{-- <div class="form-group">
            <label class="control-label col-sm-2" for="Out_time">out_time:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="time2" name="out_at" readonly="readonly" required>
            </div>
          </div> --}}
        <input type="hidden" name="out_at" id="time2"  required>
        <input type="hidden" name="accepted" value="no"  required>

          </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" id="submit" name="button">Submit</button>
        </div></div></form>




    <script>
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var currentDate= dd + "-" +( MM+1) + "-" + yyyy;
    document.getElementById('date').value=currentDate;
    var hours = tdate.getHours();
    var minutes = tdate.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    document.getElementById('time').value=strTime;
    document.getElementById('time2').value=strTime;
    </script>
    <script type="text/javascript">
    document.getElementById('submit').onclick=function()
    {
      if(confirm("are u sure to insert")){return true;}
    }
    </script>
    @endsection
