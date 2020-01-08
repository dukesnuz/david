@extends('errors::illustrated-layout')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('I apologize for this error. My database was accidentally deleted. All my
blog posts were lost. No I did not have a back up. Yes this was very foolish of me.  On a positive note,
I have added a search feature to search all blog posts. I will be re-writing the
lost and not forgotten blog posts as time permits. As I rebuild the posts I will post them to social media.'))
