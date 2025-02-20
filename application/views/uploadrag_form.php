<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<form action= "<?=base_url('Uploadrag/fileupload')?>" class="dropzone" id="fileupload"></form>

<script>
    Dropzone.options.fileupload = {
        acceptFiles: "image/*",
        maxFilesize: 1
    }
</script>