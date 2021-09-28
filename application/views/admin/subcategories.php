<div class="form-group">
    <label>Select Subcategory <span style="color: red">(Required)</span></label>
    <select name="subcategory_id" onclick="selectItem(this.value);" class="form-control select2" style="width: 100%;">
        <?php
        foreach ($select_subcategory as $v_subcategory) {
            ?>
            <option value="<?php echo $v_subcategory->subcategory_id; ?>"><?php echo $v_subcategory->subcategory_name; ?></option>
            <?php
        }
        ?>
    </select>
</div>