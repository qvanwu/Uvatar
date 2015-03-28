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

function confirmDelete() {
    return confirm('Really delete?');
}
// avatar select event
$('.img-thumbnail').click(function(){
    $('.img-thumbnail').removeClass('thumb-active');
    $(this).addClass('thumb-active');
});