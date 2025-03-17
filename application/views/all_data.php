<?php if($this->session->flashdata('successMsg')){ ?>
    <div class="alert alert-success mt-2">
        <?php echo $this->session->flashdata('successMsg'); ?>
    </div>
<?php } ?>

    <div class="container">
        <a href="<?= base_url() ?>" class="btn btn-danger mt-3">Back</a>
        <a href="<?= base_url('Crudcontroller') ?>" class="btn btn-primary mt-3 align-right">Add Record</a>
        <table class="table table-bordered mt-3">
            <tr>
                <th>S No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Language</th>
                <th>Gender</th>
                <th>Qualification</th>
                <th>Image</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
            <?php if(!empty($arr)) {
                foreach($arr as $key => $val) {
                ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $val->name ?></td>   
                <td><?php echo $val->email ?></td>
                <td><?php echo $val->phone ?></td>
                <td><?php echo $val->language ?></td>
                <td><?php echo $val->gender ?></td>
                <td><?php echo $val->qualification ?></td>
                <td><img src="<?= base_url('uploads/') ?><?php echo $val->image ?>"  alt=" " width="70" height="30"> </td>
                <td> <a href="all_data/<?=$val->id ?>" class="btn btn-outline-primary">Update </a></td>
                <td><a href="delete_data/<?=$val->id ?>" class="btn btn-outline-danger">Delete </a></td>
            </tr>
            <?php } } else { ?>
                <tr>
                    <td>No Records Found</td>
                </tr>
                <?php }  ?>
            
        </table>
    </div>