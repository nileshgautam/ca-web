<div class="pcoded-content">
    <div class="container col-sm-8">

        <div class="col-md-12 mt-5">
            <h5 class="d-inline-block mb-2 mt-2 font-weight-500">Create New Ticket</h5>
        </div>

        <div class="card">
            <form action="" class="p-3">
                <div class="form-group"><label>Customer</label>
                    <select title="Customer" name="customer" class="mb-3 form-control">
                        <option>Default select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select title="Customer" name="customer" class="mb-3 form-control">
                        <option>Default select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="" id="" class="form-control">
                </div>
                <label>Description</label>
                <div class="form-group">
                    <textarea name="" id="" cols="96" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Add Atachment</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <div class="form-group ">
                    <a class="form-control btn-sm btn-danger col-sm-2 float-right text-center" href="<?php echo base_url('User/helpdesk')?>">Cancel</a>
                    <input type="submit" value="Submit" class="form-control btn-sm btn-primary col-sm-2 float-right">
                </div>


            </form>
        </div>


    </div>

</div>


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#editor',
        menubar: false
    });
</script>