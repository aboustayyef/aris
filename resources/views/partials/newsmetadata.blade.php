<div class="meta">
	 <a href="{{route('news.edit',$newsItem->id)}}?from={{$request->path()}}">Edit Story</a>Last edited by <span class="info">{{$newsItem->last_edited_by}}</span> on <span class="info"> {{$newsItem->updated_at->format('d M Y, H:i')}}</span>
</div>