<button id="like" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Like" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-thumbsup"></i>
	@if ( $post->reactions->where('reaction', 'like')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'like')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'like')->count() }}</span>
	@endif
</button>
<button id="dislike" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Dislike" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-thumbsdown"></i>
	@if ( $post->reactions->where('reaction', 'dislike')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'dislike')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'dislike')->count() }}</span>
	@endif						
</button>
<button id="joy" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Joy" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-joy"></i>
	@if ( $post->reactions->where('reaction', 'joy')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'joy')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'joy')->count() }}</span>
	@endif						
</button>
<button id="cry" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Cry" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-cry"></i>
	@if ( $post->reactions->where('reaction', 'cry')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'cry')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'cry')->count() }}</span>
	@endif						
</button>
<button id="love" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Love" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-heart_eyes"></i>
	@if ( $post->reactions->where('reaction', 'heart_eyes')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'heart_eyes')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'heart_eyes')->count() }}</span>
	@endif						
</button>
<button id="no_mouth" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Blank Face" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-no_mouth"></i>
	@if ( $post->reactions->where('reaction', 'no_mouth')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'no_mouth')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'no_mouth')->count() }}</span>
	@endif						
</button>
<button id="grin" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Grinning" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-grin"></i>
	@if ( $post->reactions->where('reaction', 'grin')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'grin')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'grin')->count() }}</span>
	@endif						
</button>
<button id="expressionless" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Expressionless" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-expressionless"></i>
	@if ( $post->reactions->where('reaction', 'expressionless')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'expressionless')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'expressionless')->count() }}</span>
	@endif
</button>
<button id="tada" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Tada!" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-tada"></i>
	@if ( $post->reactions->where('reaction', 'tada')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'tada')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'tada')->count() }}</span>
	@endif
</button>
<button id="sob" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::user()->id }}" data-tooltip="Sobbing" class="post-likes reaction" disabled="disabled" style="cursor:not-allowed;">
	<i class="em em-sob"></i>
	@if ( $post->reactions->where('reaction', 'sob')->count() == 0)
		<span class="total hide">{{ $post->reactions->where('reaction', 'sob')->count() }}</span>
	@else
		<span class="total">{{ $post->reactions->where('reaction', 'sob')->count() }}</span>
	@endif
</button>