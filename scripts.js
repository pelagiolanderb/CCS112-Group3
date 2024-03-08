$(document).ready(function() {
    loadTasks();

    $('.add-task').click(function() {
        $('.blur-container').css({'display': 'block'});
        $('.modal-form').animate({'height': '50%', 'width': '30%'}, 'slow');
    });

    $(".btnCancel").click(function() {
        $('.blur-container').css({'display': 'none'});
        $('#taskForm')[0].reset();
    });

    $("input[name='save']").click(function() {
        $('.blur-container').css({'display': 'none'});
    });

    $('#taskForm').submit(function(event) {
        event.preventDefault();

        var taskName = $('#task-name').val().trim();
        if (taskName === '') {
            alert('Please enter a task name.');
            return;
        }

        var formData = $(this).serialize();
        $.post('add.php', formData, function(response) {
            alert(response);
            loadTasks();
        });
        $(this).trigger('reset');
    });

    $(document).on('click', '.btnDelete', function() {
        var taskId = $(this).data('id');
        $.post('delete.php', {id: taskId}, function(response) {
            alert(response);
            loadTasks();
        });
    });

    function loadTasks() {
        $.get('view.php', function(data) {
            $('.task-display').html(data);
        });
    }
});