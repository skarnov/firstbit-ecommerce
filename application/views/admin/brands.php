<?php
foreach ($select_brand as $v_brand) {
    ?>
    <option value="<?php echo $v_brand->brand_id; ?>"><?php echo $v_brand->brand_name; ?></option>
    <?php
}
?>