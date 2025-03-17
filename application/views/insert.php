<div class="container">
    <a href="<?= base_url('Crudcontroller/all_data') ?>" class="btn btn-info mt-3">View data</a>

    <?php if (!empty($arr->id)) {
        echo form_open_multipart('Crudcontroller/update_data/');
    } else {
        echo form_open_multipart('Crudcontroller/add_data/');
    } ?>
    <?php // echo form_open_multipart('Crudcontroller/add_data');
    ?>
    <!-- <form action=""> -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="col-md-6 mb-3">
                <label for="name">Full Name:</label>
                <input type="text" name="name" value="<?= set_value('name', (!empty($arr->name) ? $arr->name : '')) ?>" class="form-control" placeholder="Enter your Name">
                <?= form_error('name') ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= set_value('email', (!empty($arr->email) ? $arr->email : '')) ?>" class="form-control" placeholder="Enter your Email">
                <?= form_error('email') ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Phone:</label>
                <input type="number" name="phone" value="<?= set_value('phone', (!empty($arr->phone) ? $arr->phone : '')) ?>" class="form-control" placeholder="Enter your Phone number">
                <?= form_error('phone') ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Language:</label>
                <select name="language" class="form-control">
                    <option value="">Select</option>
                    <option value="PHP" <?= set_select('language', 'PHP', (!empty($arr->id) && $arr->language == 'PHP')) ?>>PHP</option>
                    <option value="Java" <?= set_select('language', 'Java', (!empty($arr->id) && $arr->language == 'Java')) ?>>Java</option>
                    <option value="Python" <?= set_select('language', 'Python', (!empty($arr->id) && $arr->language == 'Python')) ?>>Python</option>
                </select>
                <?= form_error('language') ?>

            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Gender:</label>
                <div class="form-group">
                    <input type="radio" name="gender" value="male" <?= set_radio('gender', 'Male', (!empty($arr->id) && $arr->gender == 'male')) ?>>Male
                    <input type="radio" name="gender" value="Female" <?= set_radio('gender', 'Female', (!empty($arr->id) && $arr->gender == 'Female')) ?>>Female
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Qualification:</label>
                <div class="form-group">
                    <input type="checkbox" name="qualification" value="BCS" <?= set_checkbox('qualification', 'BCS', (!empty($arr->id) && $arr->qualification == 'BCS')) ?>>BCS
                    <input type="checkbox" name="qualification" value="MCS" <?= set_checkbox('qualification', 'MCS', (!empty($arr->id) && $arr->qualification == 'MCS')) ?>>MCS
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="image">Image/Document:</label>
                <input type="file" name="image" class="form-control">
                <?php if (!empty($arr->id)) { ?>
                    <img src="<?php echo base_url('uploads/') . $arr->image ?>" alt="Image" width="100" height="100">
                <?php } ?>
                <?= form_error('image') ?>
            </div>
            <input type="hidden" value="<?= $arr->image ?? '' ?>" name="image_old">
            <input type="hidden" value="<?= $arr->id ?? '' ?>" name="id">
            <input type="submit" class="btn btn-info">
        </div>
    </div>
    <!-- </form> -->
    <?php form_close() ?>
</div>