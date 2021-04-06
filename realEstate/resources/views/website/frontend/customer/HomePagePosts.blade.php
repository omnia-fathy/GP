@extends('website.frontend.layouts.main')
@section('content')

<link href="{{asset('css/FrontEndCSS/CustomerHome.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/FrontEndCSS/TimeLine.css')}}" rel="stylesheet" type="text/css" />

<div id="content-wrapper">
    <div class="container-fluid">
        <div class="dashboard">
            @if( count($posts) != 0)
            @foreach($posts as $post)
            <table>
                <thead>
                    @if( isset($post_images[$post->Post_Id]) )
                    @foreach($post_images[$post->Post_Id] as $post_image)
                    <tr class="postinfo">
                        <th colspan="3">
                            <h4>
                                <?php $today = \Carbon\Carbon::now();
                                $end = \Carbon\Carbon::parse($post->updated_at);
                                ?>
                                <a href="{{url('/itemProfile/'.$post->Item_Id)}}">
                                    <img height="50" width="70" src="{{asset('FrontEnd/images/cover page/'.$post_image->File_Path)}}" alt="">
                                </a>
                                <a href="{{url('/itemProfile/'.$post->Item_Id)}}">
                                    {{ $post->Item_Name }}
                                </a>
                                <p>{{$post->created_at}}</p>
                            </h4>
                        </th>
                    </tr>
                    @endforeach
                    @endif
                </thead>

                <tbody>
                    <tr class="postcontent">
                        <td colspan="3">
                            <p>
                                {{$post->Post_Content}}
                            </p>
                        </td>
                    </tr>
                    <tr class="postfooter">
                        <td colspan="3">
                            <input type="submit" id="btun2" value="Rent">
                        </td>
                    </tr>
                    {{-- Input for comment --}}
                    <tr>
                        <td colspan="2">
                            <input type="text" class="coment" id="CommentForPost{{$post->Post_Id}}" name="comment" placeholder="Write a comment...">
                        </td>
                        <td class="arrowStyleL">
                            <a href="javascript:void(0)" onclick="Comment('{{$post->Post_Id}}');"><i class="fas fa-arrow-right arrowStyle"></i></a>
                        </td>
                    </tr>
<tr>
<a id="viewComments'{{$post->Post_Id}}" href="javascript:void(0)" onclick="viewComments('{{$post->Post_Id}}')">View Comments</a>
</tr>
                   <tr id="Comment{{$post->Post_Id}}"></tr>
                </tbody>
            </table>
            @endforeach
            @else
            @if( count($items) != 0)
            <table>
                <thead>
                    <tr>
                        <td colspan="3">
                            <p>
                                Follow items that you are interested in.
                            </p>
                        </td>
                    </tr>
                </thead>
                @foreach($items as $item)
                <tbody>
                    <tr>
                        <td colspan="3">

                            @if( count($cover__pages) != 0)
                            @foreach($cover__pages as $cover__page)
                            <a href="{{url('/itemProfile/'.$item->Item_Id)}}">
                                <img height="50" width="70" src="{{asset('FrontEnd/images/cover page/'.$cover__page->path)}}" alt="">
                            </a>
                            <a href="{{url('/itemProfile/'.$item->Item_Id)}}">
                                {{ $item->Item_Name }}
                            </a>
                            @if ($check_follow=="[]")
                            <a href="{{url('/FollowItem/'.$item->Item_Id)}}">Follow</a>
                            @else
                            <a href="{{url('/UnfollowItem/'.$item->Item_Id)}}">Un Follow</a>
                            @endif
                            @endforeach
                            @else
                            <a href="{{url('/itemProfile/'.$item->Item_Id)}}">
                                {{ $item->Item_Name }}
                            </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            @endif
            @endif
        </div>
    </div>
</div>

<script>
    function view(id) {
        // if value view reply 
        value = document.getElementById("viewReplies" + id).innerHTML;
        console.log('one');

        if (value === "View Replies") {
            var replys = document.getElementsByName("reply1" + id);
            for (var reply of replys) {
                reply.style.display = 'block';
            }
            document.getElementById("viewReplies" + id).innerHTML = "Hide Replies";
            console.log('two');
            getReplies(id);

        } else {
            var replys = document.getElementsByName("reply1" + id);
            for (var reply of replys) {
                reply.style.display = 'none';
            }
            document.getElementById("viewReplies" + id).innerHTML = "View Replies";

        }

        //else
    }
    function viewComments(id) {
        // if value view reply 
        value = document.getElementById("viewReplies" + id).innerHTML;
        console.log('one');

        if (value === "View Comments") {
            var replys = document.getElementsByName("reply1" + id);
            for (var reply of replys) {
                reply.style.display = 'block';
            }
            document.getElementById("viewComments" + id).innerHTML = "Hide Comments";
            console.log('two');
            getReplies(id);

        } else {
            var replys = document.getElementsByName("reply1" + id);
            for (var reply of replys) {
                reply.style.display = 'none';
            }
            document.getElementById("viewComments" + id).innerHTML = "View Comments";

        }

        //else
    }

    function writeReplay(id) {
        var writeReplayDivs = document.getElementsByName("writeReplay" + id);
        for (var Divs of writeReplayDivs) {
            Divs.style.display = 'block';
        }
    }

    function getComments(post_id) {


        $.ajax({
            url: "{{route('get.comments')}}",
            Type: "POST",
            data: {
                post_id: post_id,

            },
            success: function(data) {
                var Form = '';
                Object.values(data).forEach(val => {

                    Form += '<tr><td colspan="3">' +
                        '<div class="commentt">' +
                        '<a class="Usr_name" href="">' + val['First_Name'] + ' ' + val['Middle_Name'] + ' ' + val['Last_Name'] + ' </a><br>' +
                        val['Comment'] + '<br>'+
                        '<a id="viewReplies' + val['Comment_Id'] + '" href="javascript:void(0)" onclick="view(\'' + val['Comment_Id'] + '\')">View Replies</a>' +
                        '<a href="javascript:void(0)" onclick="writeReplay(\'' + val['Comment_Id'] + '\')"> reply</a>' +
                        '</div>' +
                        '</td></tr>' +
                        '<tr id="Replies' + val['Comment_Id'] + '">' +
                        '<div>' +
                        ' <tr name="writeReplay' + val['Comment_Id'] + '" style="display: none;">' +

                        ' <td colspan="2">' +
                        ' <input type="text" class="coment" id="ReplyForComment' + val['Comment_Id'] + '" name="comment' + val['Comment_Id'] + '" placeholder="Write a reply...">' +
                        ' </td>' +
                        '<td class="arrowStyleL">' +
                        '<a href="javascript:void(0)" onclick="Reply(\'' + val['Post_Id'] + '\',\'' + val['Comment_Id'] + '\');"><i class="fas fa-arrow-right arrowStyle"></i></a>' +
                        '</td>';
                    ' </tr>';
                });
                if (Form == '')
                    Form = 'No Comments';
                else
                    Form += '';


                $('#Comment' + comment_id).html(Form);
            },
            error: function() {
                console.log('Error');
            }

        });
    };

    function getReplies(comment_id) {


        $.ajax({
            url: "{{route('get.replies')}}",
            Type: "POST",
            data: {
                comment_id: comment_id,
            },
            success: function(data) {
                var Form = '';
                Object.values(data).forEach(val => {

                    Form += '<tr>' +
                        '<td colspan="3">' +
                        '<div class="commentt" name="reply1' + comment_id + '">' +
                        ' <a class="Usr_name" href="">' + val['First_Name'] + ' ' + val['Middle_Name'] + ' ' + val['Last_Name'] + '</a><br>' +
                        '<input type="hidden" name="reply' + comment_id + '">' +
                        val['Comment'] +
                        '<br>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                });
                if (Form == '')
                    Form = 'No Replies';
                else
                    Form += '';


                $('#Replies' + comment_id).html(Form);
            },
            error: function() {
                console.log('Error');
            }

        });
    };

    function Comment(post_id) {

        var comment = $("#CommentForPost" + post_id).val();

        if (comment.length == 0) {
            return;
        }

        $.ajax({
            url: "{{route('comment.add')}}",
            Type: "POST",
            data: {
                post_id: post_id,
                comment: comment

            },
            success: function(data) {

                console.log(data);
            },
            error: function() {
                console.log(post_id);
                console.log(comment);
                console.log('Error');
            }

        });
    };

    function Reply(post_id, parent_id) {

        var comment = $("#ReplyForComment" + parent_id).val();

        if (comment.length == 0) {
            return;
        }

        $.ajax({
            url: "{{route('reply.add')}}",
            Type: "POST",
            data: {
                post_id: post_id,
                parent_id: parent_id,
                comment: comment

            },
            success: function(data) {

                console.log(data);
            },
            error: function() {
                console.log(post_id);
                console.log(comment);
                console.log('Error');
            }

        });
    };
</script>

@endsection