@extends('layouts.master')

@section('title')
  Documentation
@endsection

@section('content')



<div>
<h1>Documentation</h1>
  <h2><strong>Problem Statement</strong></h2>
  <p>Building the foundation for a social media application. Implementation of the ability for 
  posts to be added to the timeline, posts to be edited and deleted, and for comments to be 
  added to the post.  </p><br> 
    
    <h2><strong>Completed Tasks</strong></h2>
    <li>All pages have navigation menu at the top. </li>
    <li>The home page displays all the posts. </li>
    <li>Next to each post, there is a number indicating how many comments are there for that post.</li>
    <li>From the home page, a click on a particular post brings up the comments page for that post. The comments page contains that particular post and comments for that post. </li>
    <li>Home page displays a form to create a new post. Each post contains a title, message, date, icon and a username.  To create a new post, a user must enter a title, message and username. Date is system generated which user does not have to type in while icon is the same for all posts. </li>
    <li>User can edit post. After a post is edited, the comments page for that post is displayed. </li>
    <li>User can delete post. After a post is deleted, the comments for that post are also deleted. </li>
    <li>User can add comments to a post. The form to add comments is displayed on the comments page. A comment must include username and message. </li>
    <li>User can delete comments.</li>
    <li>There is a unique users page which list all the users only once who have made a post. Clicking on the username brings up the posts made by that user.</li>
    <li>There is a most recent page which shows the posts made in the last 7 days. </li><br>
  
    <h2><strong>Technical Requirements fulfilled</strong></h2> 
    <li>This social media application is implemented using Laravel.</li>
    <li>Database is implemented via Raw SQL and executed through Laravel’s DB class.</li>
    <li>An SQL file is used to create tables and insert initial data. </li>
    <li>All inputs are validated.</li>
    <li>HTML and SQL sanitisation is implemented.</li>
    <li>Template inheritance is being used for this application. </li><br>

    <h2><strong>Entity Relationship Diagram</strong></h2>
    <img src="{{asset('er_diagram.jpg')}}" width=1000 height =500 alt="Entity Relation Diagram">

</div>




@endsection