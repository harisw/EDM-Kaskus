<?php echo $header; ?>
<div class="page-header">
</div>
<section class="container">
  <h1>Hasil EDM</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <a href="<?php echo base_url(); ?>" class="btn btn-danger"><h4>Back to Home</h4></a>

        <div class="box-body">
          <form name="formtocopy">
          <div class="form-group">
            <h4><span class="label label-primary"><strong>Code for Email Message:</strong></span></h4>
            <textarea name="code_email" id="email_code" rows="8" class="form-control" cols="150"><?php echo $this->session->flashdata('code_email'); ?></textarea>
            <button style="margin-top:10px; float:right; margin-left:15px;" onclick="javascript:view_email()" type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-copy"></span> Preview</button>
            <button style="margin-top:10px; float:right;" type="button" class="btn btn-primary" id="copy_email" onClick="javascript:copyClipboard('#email_code')" ><span class="glyphicon glyphicon-copy"></span> Copy email code</button>
            <button style="margin-top:10px; float:right; margin-right:15px;" class="btn btn-success" type="button" id="save_email" onclick="javascript:saveAs('email_code')" ><span class="glyphicon glyphicon-download-alt"></span> Download as HTML</button>
          </div>
          <br><br>
          <div class="form-group">
            <h4><span class="label label-primary"><strong>Code for Microsite:</strong></span></h4>
            <textarea id="microsite_code" rows="8" class="form-control" cols="150"><?php echo $this->session->flashdata('code'); ?></textarea>
            <button style="margin-top:10px; float:right; margin-left:15px;" onclick="javascript:view_microsite()" type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-copy"></span> Preview</button>
            <button style="margin-top:10px; float:right;" type="button" class="btn btn-primary" id="copy_email" onClick="javascript:copyClipboard('#microsite_code')" ><span class="glyphicon glyphicon-copy"></span> Copy Microsite code</button>
            <button style="margin-top:10px; float:right; margin-right:15px;" class="btn btn-success" type="button" id="save_email" onclick="javascript:saveAs('microsite_code')" ><span class="glyphicon glyphicon-download-alt"></span> Download as HTML</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php echo $footer; ?>

<script type="text/javascript">
  function view_email(){
    var code = document.getElementById('email_code').value;
    window.open('data:text/html,'+code);
  }
  function view_microsite(){
    var code = document.getElementById('microsite_code').value;
    window.open('data:text/html,'+code);
  }
</script>

<script type="text/javascript">
function copyClipboard(element) {
  var copyText = document.querySelector(element);
  copyText.select();
  document.execCommand("Copy");
  swal({
  title: "Code has copied to clipboard",
  text: "",
  timer: 5000,
  showConfirmButton: true
});
}

function saveAs(elementId) {
  var textToWrite = document.getElementById(elementId).value;
  var textFileAsBlob = new Blob([ textToWrite ], { type: 'text/plain' });
  if(elementId == "microsite_code")
    var fileNameToSaveAs = "index.html";
  else
    var fileNameToSaveAs = "index_email.html";

  var downloadLink = document.createElement("a");
  downloadLink.download = fileNameToSaveAs;
  downloadLink.innerHTML = "Download File";
  if (window.webkitURL != null) {
    // Chrome allows the link to be clicked without actually adding it to the DOM.
    downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
  } else {
    // Firefox requires the link to be added to the DOM before it can be clicked.
    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
  }

  downloadLink.click();
}

function destroyClickedElement(event) {
  // remove the link from the DOM
  document.body.removeChild(event.target);
}

</script>
