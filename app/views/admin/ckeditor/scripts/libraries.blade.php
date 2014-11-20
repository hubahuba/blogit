{{ HTML::script(asset('js/jquery-2.1.1.min.js')) }}
{{ HTML::script(asset('js/jquery-ui-1.10.3.min.js')) }}
{{ HTML::script(asset('js/bootstrap.min.js')) }}
{{ HTML::script(asset('js/plugins/iCheck/icheck.min.js')) }}
{{ HTML::script(asset('js/AdminLTE/app.js')) }}
<script>
    function setImage(url){
        window.opener.CKEDITOR.tools.callFunction(<?= Input::get('CKEditorFuncNum')?>,url);
        window.close();
    }
</script>