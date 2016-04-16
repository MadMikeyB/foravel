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