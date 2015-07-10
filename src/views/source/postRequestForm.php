<!-- /.post request form -->
      <section id = 'post_request'>

        <div class="row">
          <div class="portlet portlet-boxed portlet-danger">

            <div class="portlet-header">
              <h4 class="portlet-title">
                <u><i class="fa fa-check portlet-icon"></i>Post your Request</u>
              </h4>
            </div> <!-- /.portlet-header -->

            <div class="portlet-body">

              <form id="" action="<?= $baseUrl ?>postHouse" method="post" class="form parsley-form">

              <div class="col-md-5 col-lg-5 col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" data-parsley-required="true">
                </div> <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-label" for="contact">Contact Number</label>
                  <input type="text" id="contact" name="contact" class="form-control" data-parsley-required="true">
                </div> <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-label" for="address">Address</label>
                  <input type="text" id="address" name="address" class="form-control" data-parsley-required="true">
                </div> <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-label" for="from">Available From</label>
                  <input type="date" id="datepicker" name="from" class="form-control" placeholder="Choose Date">
                </div> <!-- /.form-group -->
              
              </div>

              <div class="col-md-5 col-lg-5 col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="description">Description/Details</label>
                  <textarea type="text" id="description" name="description" class="form-control" data-parsley-required="true" style="height: 133px;"></textarea>
                  </textarea>
                </div> <!-- /.form-group -->


                <div class="form-group pull-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> <!-- /.form-group -->
              </div>
              </form>
              
            </div> <!-- /.portlet-body -->

          </div> <!-- /.portlet -->
        </div>
      
      </section>
 
     <!-- /.post request form ends-->

<script>
  $(function() {
    $( '#datepicker' ).datepicker();
  });
</script>