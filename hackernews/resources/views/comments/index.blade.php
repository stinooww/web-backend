<div class="panel-heading">Article overview</div>

<div class="panel-body">

    @if(Auth::user())

        @foreach ($articles as $article)
            @if($article->id == $comments->posted_article)

                <div class="vote">
                    <form  action="/votes/up/{{$article->id}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-inline upvote"><button class="up-down">
                                <i class="fa fa-caret-up"></i></button>&nbsp;
                        </div>
                    </form>
                    <form  action="/votes/down/{{$article->id}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-inline downvote"><button class="up-down">
                                <i class="fa fa-caret-down"></i></button>&nbsp;
                        </div>
                    </form>

                </div>
                <div class="url">
                    <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                    @if(isset(Auth::user()->name))
                        @if(Auth::user()->name == $article->posted_by)
                            <a href="../articles/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                        @endif
                    @endif
                </div>
                <div class="info">
                    {{$article->votes}} points | posted by {{$article->posted_by}}
                    <?php $nrOfComments = 0 ;?>
                    @foreach($comments as $comment)
                        @if($comment->posted_article == $article->id)
                            <?php $nrOfComments++; ?>
                        @endif
                    @endforeach
                    | <a href="comments/{{$article->id}}">{{$nrOfComments}}
                        @if($nrOfComments == 1) comment @else comments @endif</a>
                </div>



                @foreach($comments as $comment)
                    @if($comment->posted_article == $article->id)
                        <div class="comments">
                            <ul>
                                <li>
                                    <div class="comment-body">{{$comment->comment}}</div>
                                    @if(isset(Auth::user()->name))
                                        @if(Auth::user()->name == $comment->name)
                                            <a href="edit/{{$comment->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                            <a href="del/{{$comment->id}}" class="btn btn-danger btn-xs edit-btn">delete</a>
                                        @endif
                                    @endif
                                    <div class="comment-info"> Posted by {{$comment->name}} on {{$comment->created_at}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endif
                @endforeach

                <form action="./add/{{$articles->id}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="body" class="col-sm-3 control-label">Comment</label>
                        <div class="col-sm-6">
                            <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i>   Add comment
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        @endforeach


    @else


        @foreach ($articles as $article)
            @if($article->id == $comments->posted_article)

                <div class="vote">

                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-inline upvote"><button class="up-down disabled" disabled>
                            <i class="fa fa-caret-up"></i></button>&nbsp;
                    </div>

                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-inline downvote"><button class="up-down disabled" disabled>
                            <i class="fa fa-caret-down"></i></button>&nbsp;
                    </div>


                </div>
                <div class="url">
                    <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                    @if(isset(Auth::user()->name))
                        @if(Auth::user()->name == $article->posted_by)
                            <a href="../articles/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                        @endif
                    @endif
                </div>
                <div class="info">
                    {{$article->votes}} points | posted by {{$article->posted_by}}
                    <?php $nrOfComments = 0 ;?>
                    @foreach($comments as $comment)
                        @if($comment->posted_article == $article->id)
                            <?php $nrOfComments++; ?>
                        @endif
                    @endforeach
                    | <a href="comments/{{$article->id}}">{{$nrOfComments}}
                        @if($nrOfComments == 1) comment @else comments @endif</a>
                </div>



                @foreach($comments as $comment)
                    @if($comment->posted_article == $article->id)
                        <div class="comments">
                            <ul>
                                <li>
                                    <div class="comment-body">{{$comment->comment}}</div>
                                    <div class="comment-info"> Posted by {{$comment->name}} on {{$comment->created_at}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endif
                @endforeach


            @endif
        @endforeach


    @endif

</div>