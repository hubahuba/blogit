{{ HTML::script(asset('js/jquery-2.1.1.min.js')) }}
{{ HTML::script(asset('js/jquery-ui-1.10.3.min.js')) }}
{{ HTML::script(asset('js/bootstrap.min.js')) }}
{{ HTML::script(asset('js/plugins/datatables/jquery.dataTables.js')) }}
{{ HTML::script(asset('js/plugins/datatables/dataTables.bootstrap.js')) }}
{{ HTML::script(asset('js/AdminLTE/app.js')) }}
<script type="text/javascript">
    var btnCancel = '<button type="button" class="btn btn-danger" id="cancelIt" onclick="javascript:resetForm(\'aForm\')">Cancel</button>'
    function resetForm(form) {
        $form = $('#'+form);
        $form.find('input:text, input:password, input:hidden, textarea, select').val('');
         $('#cancelIt').remove();
    }

    $(function() {
        $('#cList').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bAutoWidth": true
        });

        $('.aEditor').click(function(){
            var id = $(this).attr('data-id');
            var label = $(this).attr('data-label');
            var company = $(this).attr('data-company');
            var phone = $(this).attr('data-phone');
            var fax = $(this).attr('data-fax');
            var email = $(this).attr('data-email');
            var address = $(this).attr('data-address');
            var url = $(this).attr('data-url');
            var status = $(this).attr('data-status');
            $('input[name="aLabel"]').val(label);
            $('input[name="aCompany"]').val(company);
            $('input[name="aPhone"]').val(phone);
            $('input[name="aFax"]').val(fax);
            $('input[name="aEmail"]').val(email);
            $('textarea[name="aAddress"]').val(address);
            $('textarea[name="aURL"]').val(url);
            $('select[name="aStatus"]').val(status);
            $('input[name="aID"]').val(id);
            if($('#cancelIt').length < 1){
                $('.box-footer').append(btnCancel);
            }
        });
    });
</script>