<!-- Dropzone -->
<form id="dropzone" action="{{ url('provider/institutions/images/upload?_token='.csrf_token()) }}"
      class="dropzone border-dashed border-primary">
    <div class="fallback">
        <input name="file" type="file" multiple/>
    </div>
</form>
<!-- /dropzone -->


