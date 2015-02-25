<ul class="people">
	@foreach ($people as $key => $person)
		<li class="person">
			<a href="/people/{{$person->slug}}">
				<div class="profilepic">
					<img src="{{$person->image()}}" width="120px" height="auto">
				</div>
			</a>
			<div class="details">
				<a href="/people/{{$person->slug}}">{{$person->lastname}}, {{$person->firstname}}</a> 
				<br>{{$person->designation	}}
				@if(Auth::Check())
					<a class="admin" href="{{route('people.edit',$person->id)}}?from={{Request::path()}}">Edit Details</a>
				@endif
			</div>
			
		</li>
	@endforeach
</ul>