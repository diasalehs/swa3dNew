

    $(document).ready(function()
        {

                 var table = $('#unacceptedT').DataTable({
                    'columnDefs': [
                       {
                          'targets': 0,
                          'render': function(data, type, row, meta){
                                 if(type === 'display'){
                                    data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                                 }

                                 return data;
                              },
                          'checkboxes': {
                             'selectRow': true,
                             'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'

                          }
                       }
                    ],
                    'select': {
                       'style': 'multi'
                    },
                    'order': [[1, 'asc']]
                 });

                 // Handle form submission event
                 $('#frm-unaccepted').on('submit', function(e){
                    var form = this;

                    var rows_selected = table.column(0).checkboxes.selected();

                    // Iterate over all selected checkboxes
                    $.each(rows_selected, function(index, rowId){
                       // Create a hidden element
                       $(form).append(
                           $('<input>')
                              .attr('type', 'hidden')
                              .attr('name', 'unaccepted[]')
                              .val(rowId)
                       );
                    });


                 });

                   $("#unacceptedT_length").parent().hide();
                   $("#unacceptedT_info").parent().hide();

                
      });
