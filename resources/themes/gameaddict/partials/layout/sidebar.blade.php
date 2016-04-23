<div class="span4">
@unless ( $posts->all()->isEmpty() )
	<div class="widget">
		<div class="title-wrapper">
			<h3 class="widget-title"> Popular posts</h3>
			<div class="clear"></div>
		</div>
		<div class="wcontainer">
			<ul class="review">
				@foreach ( $posts->orderBy('views', 'DESC')->where('status', 'publish')->paginate('5') as $post )
				<li>
					<div class="img">
						<a rel="bookmark" href="#">
						@unless ( $post->images->isEmpty() )
	                        @foreach ( $post->images as $image )
	                            <a href="/read/{{ $post->slug }}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}" style="width:57px;"></a>
	                        @endforeach
	                    @else 
	                        <a href="/read/{{ $post->slug }}"><img src="https://source.unsplash.com/category/nature/weekly" alt="" title="" style="width:57px;"></a>
	                    @endunless
							<span class="overlay-link"></span>
						</a>
					</div>
					<div class="info">
						<a href="/read/{{ $post->slug }}">{{ $post->title }}</a><br>
						<small><i class="icon-calendar"></i> {{ $post->created_at->diffForHumans() }} - <i class="icon-comment"></i> {{ $post->comments->count() }} {{ str_plural('Comment', $post->comments->count()) }}</small><br>
					</div>
					<div class="clear"></div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
@endunless

@unless ( $forumposts->all()->isEmpty() )
	<div class="widget">
		<div class="title-wrapper">
			<h3 class="widget-title"> From the Forum</h3>
			<div class="clear"></div>
		</div>
		<div class="wcontainer">
			<ul>
				@foreach ( $forumposts->orderBy('id', 'DESC')->paginate('5') as $fpost )
					<li><a class="bbp-forum-title" href="#"><i class="icon-comment"></i><a href="/&#64;{{ $fpost->user->slug }}">{{ $fpost->user->name }}</a> on <a href="/forums/{{ $fpost->thread->forum->slug }}/{{ $fpost->thread->slug }}">{{ $fpost->thread->title }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
@endunless

@unless ( $comments->all()->isEmpty() )
	<div class="widget">
		<div class="title-wrapper">
			<h3 class="widget-title"> Recent Comments</h3>
			<div class="clear"></div>
		</div>
		<div class="wcontainer">
			<ul>
				@foreach ( $comments->orderBy('id', 'DESC')->paginate('5') as $comment )
				@if ( $comment->post->status == 'publish')
					<li><a href="&#64;{{ $comment->user->slug }}">&#64;{{ $comment->user->name }}</a> on <a class="bbp-forum-title" href="/read/{{ $comment->post->slug }}"><i class="icon-comment"></i>{{ $comment->post->title }}</a> {{ $comment->created_at->diffForHumans() }}</li>
				@endif
				@endforeach
			</ul>
		</div>
	</div>
@endunless
</div>