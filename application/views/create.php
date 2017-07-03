<?php echo $header; ?>
<section class="container">
  <div class="page-header well">
    <h1>Buat EDM</h1>
  </div>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="box box-primary">
        <?php echo form_open_multipart('home/createemail', 'id="createForm"'); ?>
        <br><br>
        <div class="box-body">
           <div class="form-group">
            <div class="custom-controls-stacked">
              <h4><span class="label label-primary"><strong>EDM Type</strong></span></h4>
              <div class="row">
              <div class="col-md-3">
                <label class="custom-control custom-radio">
                  <input onchange="checkType()" type="radio" id="radioStacked1" name="edm-type" value="promo" class="custom-control-input" checked>
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><strong>Promo</strong></span>
                </label>
              </div>
              <div class="col-md-3">
              <label class="custom-control custom-radio">
                <input onchange="checkType()" id="radioStacked2" name="edm-type" type="radio" value="Sports" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"><strong>Sport</strong></span>
              </label>
            </div>
            <div class="col-md-3">
              <label class="custom-control custom-radio">
                <input onchange="checkType()" id="radioStacked3" name="edm-type" type="radio" value="Lifestyle" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"><strong>Lifestyle</strong></span>
              </label>
            </div>
            <div class="col-md-3">
              <label class="custom-control custom-radio">
                <input onchange="checkType()" id="radioStacked3" name="edm-type" type="radio" value="Custom" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"><strong>Custom</strong></span>
              </label>
            </div>
          </div>
            </div>
          <input type="hidden" id="prevtype" name="prevtype" value="promo">
          </div>

          <div class="form-group">
            <h4><span class="label label-primary"><strong>Title</strong></span></h4>
            <input type="text" name="edm-title" class="form-control" required>
          </div>

          <div class="form-group">
            <h4><span class="label label-primary"><strong>Preheader</strong></span></h4>
            <input type="text" name="edm-preheader" class="form-control">
          </div>
          <br><br>

          <div class="form-group">
            <h4><span class="label label-primary"><strong>Microsite URL</strong></span></h4>
              <div class="row">
                <div class="col-md-5" style="margin-top:5px; padding-right:1px;">
                  <p style="float: right;">https://microsite.kaskus.co.id/edm/content/</p>
                </div>
                <div class="col-md-7" style="padding-left:0px;">
                  <input type="text" oninput="urlChange()" id="micro_url" placeholder="Place Microsite URL here" name="microsite_url" class="form-control" required>
                </div>
              </div>
          </div>

          <div class="form-group row">
            <div class="col-md-2"><h4><span class="label label-primary"><strong>Share URL</strong></span></h4></div>

            <div class="col-md-10 float-right input-group">
                <div class="input-group-addon btn-facebook"><span class="fa fa-facebook"></span></div>
                <input type="text" id="fb_url" name="edm-facebook" class="form-control" placeholder="Insert Post for Facebook Here">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10 float-right input-group">
              <div class="input-group-addon btn-twitter"><span class="fa fa-twitter"></span></div>
              <input type="text" name="edm-twitter" class="form-control" placeholder="Insert Post for Twitter Here">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10 float-right input-group">
              <div class="input-group-addon btn-google"><span class="fa fa-google"></span></div>
              <input type="text" id="gg_url" name="edm-google" class="form-control" placeholder="Insert Post for Google Plus Here">
            </div>
          </div>

          <div id="type-container" >
            <div class="form-group">
              <h4><span class="label label-primary"><strong>Content Image</strong></span></h4>
              <input type="text" name="promo-img" class="form-control" placeholder="Place image URL here">
          </div>
          <div class="form-group">
              <h4><span class="label label-primary"><strong>Content link</strong></span></h4>
              <input type="text" name="promo-link" class="form-control" placeholder="Place destination link here">
          </div>
          </div>

        </div>
        <div class="box-footer">
          <button type="submit" id="submit" name="button" class="btn btn-primary"><i class="fa fa-paper-plane"></i>Create</button>
        </div>
      </form>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</section>


<?php echo $footer; ?>

<script type="text/javascript">
function urlChange(){
  console.log("masul");
  document.getElementById('fb_url').value = document.getElementById('micro_url').value;
  document.getElementById('gg_url').value = document.getElementById('micro_url').value;
}

// $(document).ready(function() {
//     $('#micro_url').input(function() {
//       $('#fb_url').val($('#micro_url').val());
//     });
// });
</script>
<script type="text/javascript">
  function addThread(){
    var count = document.getElementById('thread-count').value;
    count++;
    var container = document.getElementById('thread-container');
    $('#thread-container').append(`<div class="form-group row">
                                    <div class="col-md-2 float-right"><h4><span class="label label-primary"><strong>Thread `+count+`</strong></span></h4></div>
                                    <div class="col-md-10 float-right">
                                      <input type="text" class="form-control share" size="5"name="title-thread`+count+`" placeholder="Title Thread `+count+`">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10 float-right">
                                      <input type="text" class="form-control share" name="link-thread`+count+`"  placeholder="Link Thread `+count+`">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10 float-right">
                                      <input placeholder="Place your thread image url here" type="text" class="form-control share" name="image-thread`+count+`" ></div>
                                      </div>`);
    document.getElementById('thread-count').value = count;
  }
  function checkType(){
    var prevtype = document.getElementById('prevtype').value;
    var type = $('input[name=edm-type]:checked', '#createForm').val();

    if((prevtype == "Sports" || prevtype == "Lifestyle" || prevtype == "Custom") && type == "promo"){
      $('#type-container').empty();
      $('#type-container').append(`<div class="form-group">
        <input type="text" name="promo-img" class="form-control" placeholder="Place image URL here">
      </div>
      <div class="form-group">
        <input type="text" name="promo-link" class="form-control" placeholder="Place destination link here">
      </div>`);
    }
    else if((prevtype == "promo" || prevtype == "Custom") && (type == "Sports" || type =="Lifestyle")){
      $('#type-container').empty();
      $('#type-container').append(`<div class="form-group">
                                    <h4><span class="label label-primary"><strong>Item Hero Image</strong></span></h4>
                                    <input type="text" name="hero-img" placeholder="Place Main Image URL here" class="form-control">
                                   </div>
                                   <div class="form-group">
                                    <h4><span class="label label-primary"><strong>Item Hero Link</strong></span></h4>
                                    <input type="text" name="hero-link" placeholder="place Main Thread link here" class="form-control">
                                   </div>
                                   <div class="form-group">
                                    <button type="button" name="button" onClick="addThread();" class="btn btn-success" id="plus"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add more thread</button>
                                   </div>
                                    <input type="hidden" name="thread-count" id="thread-count" value="0">
                                    <div id="thread-container">
                                  </div>`);
    }
    else if((prevtype == "promo" || prevtype == "Sports" || prevtype == "Lifestyle") && type == "Custom"){
      console.log("masuk");
      $('#type-container').empty();
      $('#type-container').append(`<div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                      <h4><span class="label label-primary"><strong>Custom HTML code</strong></span></h4>
                                        <textarea name="custom_code" class="form-control" rows="8" id="comment" placeholder="Insert the code between header and footer here"></textarea>
                                      </div>
                                    </div>
                                  </div>`);
    }
    document.getElementById('prevtype').value = type;
  }

</script>
