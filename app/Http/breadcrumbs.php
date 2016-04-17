<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Forum
Breadcrumbs::register('forum', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Forum', route('forums'));
});

// Home > Forums > [Forum]
Breadcrumbs::register('show_forum', function($breadcrumbs, $forum)
{
    $breadcrumbs->parent('forum');
    $breadcrumbs->push($forum->name, route('show_forum', $forum->slug));
});

// Home > Forums > [Forum] > [Thread]
Breadcrumbs::register('show_thread', function($breadcrumbs, $thread)
{
    $breadcrumbs->parent('show_forum', $thread->forum);
    $breadcrumbs->push($thread->title);
});

// Home > Posts
Breadcrumbs::register('all_posts', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Posts', route('all_posts'));
});

// Home > Posts > [Post]
Breadcrumbs::register('show_post', function($breadcrumbs, $post)
{
	$breadcrumbs->parent('all_posts');
    $breadcrumbs->push($post->title, route('show_post', $post->slug));
});
