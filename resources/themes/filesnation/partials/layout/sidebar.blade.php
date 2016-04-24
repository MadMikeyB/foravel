<!-- BEGIN #sidebar -->
	<aside id="sidebar">
		<!-- BEGIN .panel -->
		<div class="panel">
			<h2>We are social</h2>
			<div class="panel-content socialize">
				<a href="https://facebook.com/{{ Setting::get('social_facebook') }}" target="_blank" class="strike-tooltip s-fb" title="Visit Facebook"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/{{ Setting::get('social_twitter') }}" target="_blank" class="strike-tooltip s-tw" title="Visit Twitter"><i class="fa fa-twitter"></i></a>
				<a href="https://youtube.com/user/{{ Setting::get('social_youtube') }}" target="_blank" class="strike-tooltip s-yt" title="Visit YouTube"><i class="fa fa-youtube-play"></i></a>
				<a href="https://twitch.tv/{{ Setting::get('social_twitch') }}" target="_blank" class="strike-tooltip s-tc" title="Visit Twitch"><i class="fa fa-twitch"></i></a>
				<a href="http://steamcommunity.com/groups/{{ Setting::get('social_steam') }}" target="_blank" class="strike-tooltip s-st" title="Visit Steam"><i class="fa fa-steam"></i></a>
			</div>
		<!-- END .panel -->
		</div>

	@unless ( $posts->all()->isEmpty() )
		<div class="panel">
			<h2>Popular Articles</h2>
			<div class="top-right"><a href="/posts">View all</a></div>
			<div class="panel-content">
				<div class="d-articles">
					@foreach ( $posts->orderBy('views', 'DESC')->where('status', 'publish')->paginate('5') as $post )
					<div class="item">
						<div class="item-header">
						@unless ( $post->images->isEmpty() )
	                        @foreach ( $post->images as $image )
	                            <a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
	                        @endforeach
	                    @else 
	                        <a href="/read/{{ $post->slug }}"><img src="https://source.unsplash.com/category/nature/weekly" alt="" title=""></a>
	                    @endunless
						</div>
						<div class="item-content">
							<h4><a href="/read/{{ $post->slug }}">{{ $post->title }}</a></h4>
							<p>{{ str_limit(strip_tags($post->content), '40') }}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	@endunless
	
	@unless ( $forumposts->all()->isEmpty() )
	<div class="panel">
		<h2>Latest Forum Posts</h2>
		<div class="panel-content no-padding">
			@foreach ( $forumposts->orderBy('id', 'DESC')->paginate('5') as $fpost )
			<div class="new-forum-line">
				<a href="/&#64;{{ $fpost->user->slug }}" class="avatar @if ( $fpost->user->isOnline() ) online @else offline @endif app">
					<img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $fpost->user->email ) ) ) }}?s=39" class="setborder" title="" alt="" />
				</a>
				<a href="/forums/{{ $fpost->thread->forum->slug }}/{{ $fpost->thread->slug }}" class="f_content">
					<span class="sidebar-comments"><span>{{ $fpost->thread->posts->count() }}</span></span>
					<strong>{{ $fpost->thread->title }}</strong>
					<span><b class="app">{{ $fpost->user->name }}</b>, {{ $fpost->created_at->diffForHumans() }}</span>
				</a>
			</div>
			@endforeach
		</div>
	</div>
	@endunless

	@unless ( $comments->all()->isEmpty() )
	<div class="panel">
		<h2>Latest Comments</h2>
		<div class="panel-content no-padding">
			@foreach ( $comments->orderBy('id', 'DESC')->paginate('5') as $comment )
			@if ( $comment->post->status == 'publish')
			<div class="new-forum-line">
				<a href="/&#64;{{ $comment->user->slug }}" class="avatar @if ( $comment->user->isOnline() ) online @else offline @endif app">
					<img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $comment->user->email ) ) ) }}?s=39" class="setborder" title="" alt="" />
				</a>
				<a href="/read/{{ $comment->post->slug }}" class="f_content">
					<span class="sidebar-comments"><span>{{ $comment->post->comments->count() }}</span></span>
					<strong>{{ $comment->post->title }}</strong>
					<span><b class="app">{{ $comment->user->name }}</b>, {{ $comment->created_at->diffForHumans() }}</span>
				</a>
			</div>
			@endif
			@endforeach
		</div>
	</div>
	@endunless

	<!-- END #sidebar -->
</aside>