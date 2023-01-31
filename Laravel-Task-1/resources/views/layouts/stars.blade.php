@if(5 - $productRating != 0)
@php
$num_ceil = ceil($productRating); 
$num_floor = floor($productRating);
@endphp
@for($i = 0; $i < $num_floor; $i++)
<small class="fa fa-star text-primary mr-1"></small>
@endfor
<small class="fa fa-star-half text-primary mr-1"></small>
@if($num_ceil < 5)
@php
$temp = 5 - $num_ceil;
@endphp
@for($i = 0; $i < $temp; $i++)
<small><i class="far fa-star text-primary mr-1"></i></small>
@endfor
@endif
@else
@for($i = 0; $i < $productRating; $i++)
<small class="fa fa-star text-primary mr-1"></small>
@endfor
@if($productRating < 5)
@php
$temp = 5 - $productRating;
@endphp
@for($i = 0; $i < $temp; $i++)
<small><i class="far fa-star text-primary mr-1"></i></small>
@endfor
@endif
@endif
@yield('stars')