$(document).ready(function() {
    // When come task page show by defult high priority tasks
    loadDataByPriority('high');

    // Click event handler for priority buttons
    $('.priority-button').click(function() {
       var priority = $(this).data('priority');
       localStorage.setItem('before_delete_priority', priority.toString());
       loadDataByPriority(priority);
    });
  
 });


// Function to load data based on priority
function loadDataByPriority(priority) {
    $.ajax({
        url: priority === 'all' ? '/fetchAllTasks' : '/fetchTasksByPriority/' + priority,
        type: 'GET',
        success: function(data) {
            // Clear existing table data
            $('#tasks-list').DataTable().clear().destroy();

            // Reinitialize DataTable with new data
            $('#tasks-list').DataTable({
            data: data,
            columns: [
                    { 
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1+'.';                            // This code work like serial number.
                        }
                    },
                    { 
                        data: 'title',
                        render: function(data, type, row) {
                        return '<h5>' + data + '</h5><p>' + (row.description.length > 25 ? row.description.substr(0, 25)+'...' : row.description) + '</p>';
                        }
                    
                    },
                    {
                        data: 'priority',
                        render: function(data, type, row) {
                        var statusClass = '';
                        if (data === 'high') {
                            statusClass = 'btn btn-md btn-danger';
                        } else if (data === 'medium') {
                            statusClass = 'btn btn-md btn-warning';
                        } else if (data === 'low') {
                            statusClass = 'btn btn-md btn-success';
                        }
                        return '<span class="' + statusClass + '">' + data + '</span>';
                        }
                },
                    { data: 'due_date' },
                    
                    { data: 'user_first_name' },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                        var statusClass = '';
                        if (data === 'start') {
                            statusClass = 'badge bg-primary';
                        } else if (data === 'pending') {
                            statusClass = 'badge bg-warning';
                        } else if (data === 'due') {
                            statusClass = 'badge bg-secondary';
                        }
                        else if (data === 'completed') {
                            statusClass = 'badge bg-success';
                        }
                        
                        return '<span class="' + statusClass + '">' + data + '</span>';
                        }
                },
                    {
                        data: null,
                        render: function(data, type, row) {
                        return `
                                <a href="/edit_task/${row.id}">
                                    <i class="fa-solid fa-pen-to-square fs-4 text-muted"></i>
                                </a>
                                <a href="/view_task/${row.id}">
                                    <i class="fa-solid fa-eye fs-4 text-muted"></i>
                                </a>
                            <?php if($user_info['role_name'] == 'admin'): ?>
                                <a onclick="delete_task('${row.id}')">
                                <i class="fa-solid fa-trash-can fs-4 text-muted"></i>
                            </a>
                            <?php endif; ?>
                        `;
                        }
                    }
                    // Add more columns as needed
                ]
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
 
 function delete_task(id) {
    let return_value = false;
    if(confirm('Are you sure you want to delete this student?')){
        
        return_value = true;

        // Your AJAX call to delete the task
        $.ajax({
            url: '/delete_task/'+id, // Replace with your actual Controller method path
            type: 'GET',
            data: {},
            success: function(data) {
                // After successfully deleting the task, set the priority again from localStorage
                loadDataByPriority(localStorage.getItem('before_delete_priority'))
            },
            error: function(error) {
                console.log(error);
            }
        });

        
    }
    else{
        return_value = false;
    }
}