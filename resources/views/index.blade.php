<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>To Do Lists Application</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <section id="data_section" class="todo">
                        <div class="row">
                            <div class="col-md-3 pull-right">
                                <button type="button" id="btnAdd" class="btn btn-success form-control"><i class="fa fa-plus-square" aria-hidden="true" ></i></button>
                            </div>
                        </div>

                        <div class="row">
                            <ul id="task_list" class="todo-list">
                                @foreach($todos as $todo)
                                    @if($todo->status)
                                        <li id="{{$todo->id}}" class="done">
                                            <a href="#" class="toggle"></a>
                                            <span id="span_{{$todo->id}}">{{$todo->title}}</span>
                                            <a href="#" onclick="delete_task('{{$todo->id}}')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                            <a href="#" onclick="edit_task('{{$todo->id}}', '{{$todo->title}}')"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        </li>
                                    @else
                                        <li id="{{$todo->id}}">
                                            <a href="#" onclick="task_done('{{$todo->id}}')" class="toggle">Done</a>
                                            <span id="span_{{$todo->id}}">{{$todo->title}}</span>
                                            <a href="#" onclick="delete_task('{{$todo->id}}')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                            <a href="#" onclick="edit_task('{{$todo->id}}', '{{$todo->title}}')"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </section>

                    <section id="form_section">

                        <form id="add_task" class="todo" style="display: none;">

                            <div class="form-group">
                                <input type="text" name="title" id="task_title" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="submit">Create New Task</button>
                            </div>
                        </form>

                        <form id="edit_task" class="todo" style="display: none;">
                            <input type="hidden" name="" id="edit_task_id">

                            <div class="form-group">
                                <input type="text" name="title" id="edit_task_title" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit">Edit Task</button>
                            </div>
                        </form>

                    </section>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>