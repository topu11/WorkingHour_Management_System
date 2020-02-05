@extends('admin.master')
@section('title')
    Admin Dashboard
@endsection
@section('content')
<table class="table table-responsive table-hober">
    <tr>
        <th>id</th>
        <th>email</th>
        <th>name</th>
        <th>date</th>
        <th>in_at</th>
        <th>out_at</th>
        <th>accepted</th>
        <th>Confirm</th>
      </tr>
      @php $total_hour=0;@endphp
      @php $i=0; @endphp
    @foreach($attendance as $attendance)
    @php $i++; @endphp
    <tr>
        <th >{{$i}}</th>
        <th >{{$attendance->email}}</th>
        <th >{{$attendance->name}}</th>
        <th >{{$attendance->date}}</th>
        <th >{{$attendance->in_at}}</th>
        <th >{{$attendance->out_at}}</th>
        <th >{{$attendance->accepted}}</th>
        <th>
            <a href="{{route('admin.confirm',$attendance->id)}}"><button class="btn btn-success">Confirm</a>
            <a href="{{route('admin.delete',$attendance->id)}}"><button class="btn btn-danger" onclick="return checkDelete()";>delete</a>
            </th>
          </tr>

        @endforeach
    </tr>
</table>
<script>
    function checkDelete()
    {
        if(confirm("sure to delete"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
@endsection

