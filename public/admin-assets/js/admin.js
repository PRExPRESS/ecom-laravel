

$('document').ready(function() {

    $('#privileges').hide();
    //show privileges
    $('#role').on('change', function() {
        var role = $(this).val();
        if (role === 'admin' || role === 'editor') {
            $('#privileges').show();
        } else {
            $('#privileges').hide();
        }

    });

    $('#select-all').on('change', function() {
        
        if (this.checked) {
            $('#privileges').find('input[type="checkbox"]').prop('checked', true);
        } else {
            
            $('#privileges').find('input[type="checkbox"]').prop('checked', false);
        }
    });

    $('#admin-create-user').on('submit', function(e) {
        e.preventDefault();

        let selectedPrev = [];
        $('#privileges').find('input[type="checkbox"]:checked').each(function() {
            if($(this).attr('id') !== 'select-all'){
                selectedPrev.push({
                    [$(this).attr('id')]: $(this).val()
                    
                     
                });
                
            }
        });
        console.log(selectedPrev);
        $('<input>').attr({
            type: 'hidden',
            name: 'privileges',
            value: JSON.stringify(selectedPrev) // Send selected privileges as a JSON string
        }).appendTo('#admin-create-user');

        $('#admin-create-user')[0].submit();

        
    })

}  );