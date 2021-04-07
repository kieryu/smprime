<?php $fields = get_fields(); ?>

<section class="smph-wrapper">
    <div class="smph-inner-subcontainer">
        <h2><strong><?php echo $fields['title'];?></strong></h2>
        <br>
        <p><?php echo $fields['sub_title'];?></p>
    </div>
</section>
<section class="smph-wrapper icons">
    <div class="smph-inner-subcontainer">
        <div class="grid-row">
            <?php $icons = get_field('icons'); ?>
            <?php foreach ($icons as $key => $value) { ?> 
            <div class="grid-col">
                <img src="<?php echo $value['image']['url']; ?>" alt="">
                <h3><strong><?php echo $value['label']; ?></strong></h3>
                <p><?php echo $value['sub_label']; ?></p>
            </div> 
            <?php } ?> 
        </div>
    </div>
</section>
<section class="smph-wrapper guidelines">
    <div class="smph-inner-subcontainer">
        <h3><strong><?php echo $fields['guidelines_label']; ?></strong></h3>
    </div>
</section>
<section class="smph-wrapper disclose">
    <div class="smph-inner-subcontainer">
        <h3><strong><?php echo $fields['asm_disclosure_label']; ?></strong></h3>
        <?php echo $fields['asm_disclosure_list']; ?>
    </div>
</section>