<h1 style="color:blue">your name is: {{Auth::user()->name}}</h1>
<h1 style="color:blue">your name is: {{Auth::user()->email}}</h1>
<table class="table table-responsive table-hober">
    <tr>
        <th>id</th>
        <th>date</th>
        <th>in_at</th>
        <th>out_at</th>
        <th>accepted</th>
        <th>Working_today</th>
      </tr>
      @php $total_hour=0;@endphp
      @php $i=0; @endphp
    @foreach($attendance as $attendance)
    @php $i++; @endphp
    <tr>
        <th >{{$i}}</th>
        <th >{{$attendance->date}}</th>
        <th >{{$attendance->in_at}}</th>
        <th >{{$attendance->out_at}}</th>
        <th >{{$attendance->accepted}}</th>
        <th ><?php
        $min=0;
        list($hour,$next) = explode(":", $attendance->out_at);
list($min,$format)=explode(" ", $next);


	if($format="pm")
	{

		$hour=(int)$hour+12;

	}
 list($hour1,$next1) = explode(":", $attendance->in_at);
 list($min1,$format1)=explode(" ", $next1);

 if($format1="pm")
	{

		$hour1=(int)$hour1+12;

    }
    $hour1=(int)$hour1;
  $min=(int)$min;
 $min1=(int)$min1;

   if($min<$min1)
   {
       $min=$min+60;
       $hour1=$hour1+1;
       $min=$min-$min1;
  }
  if($min>=$min1)
  {
    $min=$min-$min1;
  }
   $min=$min/60;
//   $cmin=(float)$cmin;
    $hour=$hour-$hour1;

   $hour=(float)$hour;
   $hour=$min+$hour;
// // echo $min;
//  echo $min1;
// echo $cmin;

  echo $hour;
            ;?></th>
<?php

 $total_hour=$total_hour+$hour;?>
@endforeach
</table>
<strong style="color:blue">Your Total working hour is : {{$total_hour}}</strong>
