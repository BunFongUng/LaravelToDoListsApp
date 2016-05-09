

    $('#btnAdd').click(function() {
        show_form('add_task')
    });

    function task_done(id) {
        $.get('/done/' + id, function(data) {
            if(data == "OK") {
                $('#' + id).addClass('done');
            }
        });
    }

    function delete_task(id) {
        $.get('/delete/' + id, function(data) {
            if(data == "OK") {
                var target = $('#' + id);
                target.hide('slow', function() {
                    target.remove();
                });
            }
        });
    }

    function show_form(form_id) {
        $('form').hide();
        $('#' + form_id).show('slow');
    }

    function edit_task(id, title) {
        $('#edit_task_id').val(id);
        $('#edit_task_title').val(title);
        show_form('edit_task');
    }

    $('#add_task').submit(function(event) {
        event.preventDefault();
        console.log("Hello, World!");
        var title = $('#task_title').val();

        if(title) {
            $.post("/add", { title : title}).done(function(data) {
                $('#add_task').hide('slow');
                $('#task_list').append(data);
            });
        } else {
            alert("Please give a title to task");
        }
    });

    $('#edit_task').submit(function(event) {
        event.preventDefault();

        var task_id = $('#edit_task_id').val();
        var task_title = $('#edit_task_title').val();
        var current_title = $('#span_' + task_id).text();
        var new_title = current_title.replace(current_title, task_title);

        if(task_title) {
            $.post('/update/' + task_id, { title : task_title }).done(function(data) {
                $('#edit_task').hide('slow');
                $('#span_' + task_id).text(new_title);
            });
        } else {
            alert("Please give a title to task");
        }
    });
