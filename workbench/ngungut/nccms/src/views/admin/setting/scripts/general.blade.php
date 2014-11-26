{{ HTML::script(asset('js/jquery-2.1.1.min.js')) }}
{{ HTML::script(asset('js/jquery-ui-1.10.3.min.js')) }}
{{ HTML::script(asset('js/bootstrap.min.js')) }}
{{ HTML::script(asset('js/plugins/iCheck/icheck.min.js')) }}
{{ HTML::script(asset('js/AdminLTE/app.js')) }}
<script>
    $(function(){
        $('.custFormat').focus(function(){
            var holder = $(this).attr('for');
            $('#'+holder).iCheck('check');
        });
        $('.custFormat').keyup(function(){
            var format = $(this).val();
            var type = $(this).attr('name');
            if(format){
                $.post('{{ URL::to('ajax/dater') }}', {format:format}, function(json){
                    if(json.success){
                        if(type == 'timeCustom'){
                            $('#timeDisplay').html(json.success);
                        }else{
                            $('#dateDisplay').html(json.success);
                        }
                    }else{
                        alert('Format not found.');
                    }
                });
            }
        });
    });
</script>