{{ HTML::script(asset('js/jquery-2.1.1.min.js')) }}
{{ HTML::script(asset('js/jquery-ui-1.10.3.min.js')) }}
{{ HTML::script(asset('js/bootstrap.min.js')) }}
{{ HTML::script(asset('js/plugins/iCheck/icheck.min.js')) }}
{{ HTML::script(asset('js/AdminLTE/app.js')) }}
{{ HTML::script(asset('js/plugins/ckeditor/ckeditor.js')) }}
<script type="text/javascript">
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor');
    });
</script>