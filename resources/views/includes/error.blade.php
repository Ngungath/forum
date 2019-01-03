<div class="text-center">
    @if(count($errors) > 0)
<ul class="list-group" style="color: red;">
    @foreach($errors->all() as $error)
    <li class="list-item">
      {{$error}}  
    </li>
 @endforeach
</ul>
@endif
</div>