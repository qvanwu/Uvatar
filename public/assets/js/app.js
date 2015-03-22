// upload.blade.php
$('#uploadImage').click(function(e){
    $('#inputFile').click();
});

$('#inputFile').change(function(){
    $('#fileName').html($(this).val());
    $('.upload-field').removeClass('hidden');
});

$('#btnSubmit').click(function(){
    $('#formUpload').ajaxForm({}).submit();
});

$('#btnCancel').click(function(){
    $('.upload-field').addClass('hidden');
});